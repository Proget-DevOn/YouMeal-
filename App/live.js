  let api;
  let salle="<?php echo $donnees['ID_live']; ?>"
  const initIframeAPI = () => {
    const domain = '8x8.vc';
    const options = {
      roomName: "YouMeal/<?php echo $donnees['ID_live']; ?>",
      height: '300pt',
      parentNode: document.querySelector('#meet'),
      userInfo: {
       displayName: "<?php echo $_SESSION['login']; ?>"
   }
    };
    api = new JitsiMeetExternalAPI(domain, options);
  }

  window.onload = () => {
    initIframeAPI();
  }
