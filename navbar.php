<style>
*{
  font-family: 'Outfit', sans-serif;;
}
  
    body {
    margin: 0;
  }

    header {
    background-color: rgba(0, 0, 0, 0.8);
    padding: 0 3rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    z-index: 999;
    left: 0;
    right: 0;
    top: 0;
    height: 5rem;
  }

  .logo > a > img{
    height: 3rem;
    font-weight: bold;
  }

  .logo > a{
    text-decoration: none;
    color: white;
  }

  nav {
    flex-grow: 1;
    text-align: center;
  }

  nav a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
    font-size: 1.2em;
  }

  .profile {
    position: relative;
    cursor: pointer;
    background-image: linear-gradient(to bottom, rgba(9, 15, 31, 1), rgba(3, 21, 71, 0.46));
    padding: 12px 16px;
    border: 1px solid white;
    border-radius: 0.5rem 0.5rem 0 0;
  }

  .profile:hover{
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }

  .profile-options {
    display: none;
    position: absolute;
    top: 125%;
    right: 0;
    background-color: rgba(3, 18, 45, 1);
  }

  .profile-options a {
    color: rgba(191, 200, 234, 1);
    padding: 12px 16px;
    text-decoration: none;
    display: block;

  }

  .icon{
    display: flex;
    align-items: center;
  }

  .icon img{
    margin-left: 0.5rem;
    width: 1rem;
    height: 1rem;
    opacity: 0.5;
  }
</style>

<header>
    <div class="logo"><a href="index.php"><img src="/css/img/logo.png" alt=""></a></div>
    <div class="profile" onclick="toggleProfileOptions()">
      <div class="profile-name"> <?=$_SESSION['nama']?> </div>
      <div class="profile-options" id="profileOptions">
        <a href="profil.php" class="icon"><span>Profile</span><img width="24" height="24" src="/css/icon/profil.png" alt="user"/></a>
        <a href="logout.php" class="icon"><span>Logout</span><img width="30" height="30" src="/css/icon/logout.png" alt="exit"/></a>
      </div>
    </div>
</header>

<script>
  function toggleProfileOptions() {
    var profileOptions = document.getElementById("profileOptions");
    profileOptions.style.display = (profileOptions.style.display === "block") ? "none" : "block";
  }
</script>