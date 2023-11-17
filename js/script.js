// Penggunaan kelas untuk mengelola navigasi
// variabelnya adalah menu dan navbar
class NavigationManager {
    constructor(menuElement, navbarElement) {
      this.menu = menuElement;
      this.navbar = navbarElement;
    }
  
    // penggunaan metode untuk mengelola menu
    toggleMenu() {
      this.menu.classList.toggle('fa-times');
      this.navbar.classList.toggle('active');
    }
  
    // penggunaan metode untuk mereset menu
    resetMenu() {
      this.menu.classList.remove('fa-times');
      this.navbar.classList.remove('active');
    }
  }
  
  // penggunaan konstruktor dalam membuat objek NavigationManager dengan elemen menu dan navbar
  const navigation = new NavigationManager(
    document.querySelector('#menu-bars'),
    document.querySelector('.navbar')
  );
  
  // Menambahkan event listener untuk mengelola menu saat diklik
  // Ketika elemen menu diklik, metode toggleMenu() dari objek navigation akan dijalankan.
  navigation.menu.onclick = () => {
    navigation.toggleMenu();
  };
  
  // Menambahkan event listener untuk mereset menu saat di-scroll
  //Ketika terjadi scroll pada window, metode resetMenu() dari objek navigation akan dijalankan.
  window.onscroll = () => {
    navigation.resetMenu();
  };
  
