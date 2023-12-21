//setTimeout(update(), 100)

function update() { 
  const progress = document.querySelector('.progress-done');
  const percent = document.querySelector('small');
  
  let width = 1; 
  let identity = setInterval(scene, 2000); 
  function scene() { 
    if (width >= 100) { 
      clearInterval(identity); 
    } else { 
      width++;        
      progress.style.width = width + '%';
      percent.innerHTML = width + '%';
    } 
  } 
}