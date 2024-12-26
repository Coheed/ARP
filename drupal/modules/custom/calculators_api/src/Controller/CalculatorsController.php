<?php

namespace Drupal\calculators\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

class CalculatorsController extends ControllerBase {

    public function getGozPoints($gozNumber) {
        try {
            // Datenbankverbindung herstellen und Abfrage erstellen
            $connection = \Drupal::database();
            $query = $connection->select('node__field_gebuehrenziffer', 'g');
            $query->fields('p', ['field_punktzahl_value']);
            $query->condition('g.field_gebuehrenziffer_value', $gozNumber);
            $query->join('node__field_punktzahl', 'p', 'g.entity_id = p.entity_id');
    
            // Abfrage ausführen und die Punktzahl abrufen
            $result = $query->execute()->fetchField();
    
            // Wenn eine Punktzahl gefunden wurde, diese zurückgeben
            if ($result !== FALSE) {
                return new JsonResponse(['points' => $result]);
            } else {
                // Fehlermeldung bei nicht vorhandener Punktzahl
                return new JsonResponse(['error' => 'Punktzahl nicht gefunden'], 404);
            }
        } catch (\Exception $e) {
            \Drupal::logger('calculators')->error($e->getMessage());
            return new JsonResponse(['error' => 'Datenbankabfrage fehlgeschlagen'], 500);
        }
    }
    
    public function getModeratorComment($bemaNumber) {
        $connection = \Drupal::database();
    
        try {
            $comment = $connection->select('moderator_comments', 'm')
                ->fields('m', ['comment'])
                ->condition('bema_number', $bemaNumber)
                ->execute()
                ->fetchField();
    
            return new JsonResponse(['comment' => $comment ?? '']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Fehler beim Laden des Kommentars'], 500);
        }
    }
    
    public function saveModeratorComment() {
        $request = \Drupal::request();
        $data = json_decode($request->getContent(), TRUE);
    
        if (!isset($data['bema_number'], $data['comment'])) {
            return new JsonResponse(['error' => 'Ungültige Eingabedaten'], 400);
        }
    
        $connection = \Drupal::database();
    
        try {
            $connection->merge('moderator_comments')
                ->key('bema_number', $data['bema_number'])
                ->fields(['comment' => $data['comment']])
                ->execute();
    
            return new JsonResponse(['message' => 'Kommentar gespeichert']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Fehler beim Speichern des Kommentars'], 500);
        }
    }
    

    public function bemaGozComparison($number) {
        $connection = \Drupal::database();
    
        // BEMA-Nummer suchen und die Bewertungszahl und GOZ-Referenznummer abrufen
        $entity_id = $connection->select('node__field_bema_nr', 'b')
            ->fields('b', ['entity_id'])
            ->condition('b.field_bema_nr_value', $number)
            ->execute()
            ->fetchField();
    
        if ($entity_id) {
            // Bewertungszahl für die BEMA-Leistung abrufen
            $evaluationValue = $connection->select('node__field_bema_bewertungszahl', 'e')
                ->fields('e', ['field_bema_bewertungszahl_value'])
                ->condition('e.entity_id', $entity_id)
                ->execute()
                ->fetchField();

                  // Leistung für die BEMA-Leistung abrufen
        $bemaLeistung = $connection->select('node__field_leistung', 'l')
        ->fields('l', ['field_leistung_value'])
        ->condition('l.entity_id', $entity_id)
        ->execute()
        ->fetchField();
    
            // GOZ-Referenznummer abrufen
            $goz_ref_entity_id = $connection->select('node__field_referenzziffer', 'r')
                ->fields('r', ['field_referenzziffer_target_id'])
                ->condition('r.entity_id', $entity_id)
                ->execute()
                ->fetchField();
    
            $gozNumber = null;
            $pointsValue = null;
            $gozLeistung = null;

    
            if ($goz_ref_entity_id) {
                // Gebührenziffer (GOZ-Nummer) abrufen
                $gozNumber = $connection->select('node__field_gebuehrenziffer', 'g')
                    ->fields('g', ['field_gebuehrenziffer_value'])
                    ->condition('g.entity_id', $goz_ref_entity_id)
                    ->execute()
                    ->fetchField();
    
                // Punktzahl für die GOZ-Leistung abrufen
                $pointsValue = $connection->select('node__field_punktzahl', 'p')
                    ->fields('p', ['field_punktzahl_value'])
                    ->condition('p.entity_id', $goz_ref_entity_id)
                    ->execute()
                    ->fetchField();


                       // Leistung für die GOZ-Leistung abrufen
            $gozLeistung = $connection->select('node__field_leistungsinhalt', 'l')
            ->fields('l', ['field_leistungsinhalt_value'])
            ->condition('l.entity_id', $goz_ref_entity_id)
            ->execute()
            ->fetchField();
            }
    
            return new JsonResponse([
                'evaluation' => $evaluationValue ?? null,
                'bema_leistung' => $bemaLeistung ?? null,
                'goz_ref' => $gozNumber ?? null,
                'goz_leistung' => $gozLeistung ?? null,
                'points' => $pointsValue ?? null,
            ]);
        } else {
            // Fehlerantwort, falls die BEMA-Nummer nicht gefunden wird
            return new JsonResponse(['error' => 'BEMA-Nummer nicht gefunden'], 404);
        }
    }


    public function saveBemaGozData() {
        $request = \Drupal::request();
        $data = json_decode($request->getContent(), TRUE);
    
        if (!isset($data['bema_number'], $data['bema_service'], $data['goz_service'])) {
            return new JsonResponse(['error' => 'Ungültige Eingabedaten'], 400);
        }
    
        $connection = \Drupal::database();
    
        try {
            // BEMA-Leistung speichern
            $entity_id = $connection->select('node__field_bema_nr', 'b')
                ->fields('b', ['entity_id'])
                ->condition('b.field_bema_nr_value', $data['bema_number'])
                ->execute()
                ->fetchField();
    
            if ($entity_id) {
                // BEMA-Leistung aktualisieren
                $connection->update('node__field_leistung')
                    ->fields(['field_leistung_value' => $data['bema_service']])
                    ->condition('entity_id', $entity_id)
                    ->execute();
    
                // GOZ-Leistung aktualisieren
                $goz_entity_id = $connection->select('node__field_referenzziffer', 'r')
                    ->fields('r', ['field_referenzziffer_target_id'])
                    ->condition('r.entity_id', $entity_id)
                    ->execute()
                    ->fetchField();
    
                if ($goz_entity_id) {
                    $connection->update('node__field_leistungsinhalt')
                        ->fields(['field_leistungsinhalt_value' => $data['goz_service']])
                        ->condition('entity_id', $goz_entity_id)
                        ->execute();
                }
    
                return new JsonResponse(['message' => 'Daten erfolgreich gespeichert']);
            } else {
                return new JsonResponse(['error' => 'BEMA-Nummer nicht gefunden'], 404);
            }
        } catch (\Exception $e) {
            \Drupal::logger('calculators')->error($e->getMessage());
            return new JsonResponse(['error' => 'Speichern fehlgeschlagen'], 500);
        }
    }
    
    
}
