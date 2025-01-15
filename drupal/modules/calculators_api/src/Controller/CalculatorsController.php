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
    
            // GOZ-Referenznummer und Punktzahl abrufen
            $goz_ref = $connection->select('node__field_referenzziffer', 'r')
                ->fields('r', ['field_referenzziffer_target_id'])
                ->condition('r.entity_id', $entity_id)
                ->execute()
                ->fetchField();
    
            $pointsValue = null;
            if ($goz_ref) {
                $pointsValue = $connection->select('node__field_punktzahl', 'p')
                    ->fields('p', ['field_punktzahl_value'])
                    ->condition('p.entity_id', $goz_ref)
                    ->execute()
                    ->fetchField();
            }
    
            return new JsonResponse([
                'evaluation' => $evaluationValue ?? null,
                'goz_ref' => $goz_ref ?? null,
                'points' => $pointsValue ?? null,
            ]);
        } else {
            // Fehlerantwort, falls die BEMA-Nummer nicht gefunden wird
            return new JsonResponse(['error' => 'BEMA-Nummer nicht gefunden'], 404);
        }
    }
    
    
}
