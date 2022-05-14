let installButton = document.getElementById("installApp");

let prompt;
window.addEventListener('beforeinstallprompt', function(e){
    // Prevent the mini-infobar from appearing on mobile
    e.preventDefault();
    // Stash the event so it can be triggered later.
    prompt = e;
});

installButton.addEventListener('click', function(){
    prompt.prompt();
});

let installed = false;
installButton.addEventListener('click', async function(){
    prompt.prompt();
    let result = await that.prompt.userChoice;
    if (result&&result.outcome === 'accepted') {
        installed = true;
    }
});

window.addEventListener('appinstalled', async function(e) {
    installButton.style.display = "none";
    console.log("installed pwa")
});

