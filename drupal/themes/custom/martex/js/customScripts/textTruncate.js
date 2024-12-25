//SHORTENER FOR COMMENTS AND HINTS 
document.addEventListener("DOMContentLoaded", function () {
	document.querySelectorAll('.field.field--name-field-kommentare-hinweise').forEach(function (container) {
	  // Speichere die originale HTML-Struktur des Containers
	  const originalContent = container.innerHTML;
  
	  // Erstelle eine gekürzte Vorschau (125 Zeichen aus allen Paragraphen)
	  const paragraphs = Array.from(container.querySelectorAll('.paragraph'));
	  const previewText = paragraphs.map(p => p.innerText).join(' ').slice(0, 425) + '...';
  
	  // Erstelle eine Vorschau
	  const previewDiv = document.createElement('div');
	  previewDiv.classList.add('short-text');
	  previewDiv.textContent = previewText;
  
	  // Erstelle einen "Weiterlesen"-Button
	  const readMoreButton = document.createElement('button');
	  readMoreButton.textContent = 'Weiterlesen';
	  readMoreButton.classList.add('read-more');
	  readMoreButton.style.marginTop = '10px';
  
	  // Leere den Container und füge die Vorschau und den Button hinzu
	  container.innerHTML = '';
	  container.appendChild(previewDiv);
	  container.appendChild(readMoreButton);
  
	  // Event-Listener für "Weiterlesen"
	  readMoreButton.addEventListener('click', function () {
		// Füge die originale HTML-Struktur wieder ein
		container.innerHTML = originalContent;
	  });
	});
  });