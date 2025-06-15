// Tab-Funktion
function openPage(evt, pageName) {
  // Alle tabcontent ausblenden
  let tabcontent = document.querySelectorAll(".tabcontent");
  tabcontent.forEach(tc => tc.classList.remove("active"));

  // Alle Buttons in der Navbar deaktivieren
  let tablinks = document.querySelectorAll(".tablink");
  tablinks.forEach(btn => btn.classList.remove("active"));

  // Alle rechten Punkte deaktivieren
  let navDots = document.querySelectorAll("#nav-dots a");
  navDots.forEach(dot => dot.classList.remove("active"));

  // Die gewählte Seite zeigen
  document.getElementById(pageName).classList.add("active");

  // Den geklickten Button aktivieren
  evt.currentTarget.classList.add("active");

  // Auch den rechten Punkt aktivieren, der zum Tab passt
  navDots.forEach(dot => {
    if(dot.getAttribute("href") === "#" + pageName) {
      dot.classList.add("active");
    }
  });
}

// Standard-Tab öffnen beim Laden
document.addEventListener("DOMContentLoaded", () => {
  const defaultTab = document.getElementById("defaultOpen");
  if (defaultTab) {
    defaultTab.click();
  }
});

// GSAP + ScrollMagic Animationen (optional, wenn du die libs einbindest)
if(window.gsap && window.ScrollMagic){
  const controller = new ScrollMagic.Controller();
  document.querySelectorAll(".slide").forEach(slide => {
    const tween = gsap.from(slide, {opacity: 0, y: 80, duration: 0.6, ease: "power2.out"});
    new ScrollMagic.Scene({
      triggerElement: slide,
      triggerHook: 0.85,
      reverse: false
    })
    .setTween(tween)
    .addTo(controller);
  });
}
