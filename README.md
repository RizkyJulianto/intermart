
# Intermart 🛒

**Intermart** is a web-based stock management application created as part of the BeSmart activities of Intermedia SMEs. This application is equipped with an item data CRUD feature and QR Code integration for more efficient stock management.


## Demo 📸
![Image](https://github.com/user-attachments/assets/b0fe75f9-3472-4dcc-b01e-88d3ed0346c2)



## Technology 🛠️
<div align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="html5 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40" alt="css3 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="javascript logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original-wordmark.svg" height="40" alt="tailwindcss logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="php logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" height="40" alt="mysql logo"  />
</div>

###
- HTML Basic structure of web pages (markup of elements such as forms, tables, capitals, etc.).
- Tailwind CSS Framework The first CSS utility for styling quickly and responsively.
- JavaScript Add dynamic interactions such as modal open/close, validation, and notification.
- PHP to connect with the database
- SweetAlert for interactive notifications  ([SweetAlert](https://sweetalert2.github.io/))
- Flowbit for popup modal ([Flowbite](https://flowbite.com/))
- phpqrcode for generate qr ([phpqrcode](https://sourceforge.net/projects/phpqrcode/))
- HTML5 QRCode JavaScript library to scan QR codes directly from the user's webcam. ([HTML5 QRCode](https://github.com/mebjas/html5-qrcode) 


## Features 🚀
- User Login & Register
- Item data management (Add, Change, Delete)
- Item search
- History of data changes, deletions and additions
- Scan QR Code to enter and reduce stock items
- Interactive notifications with SweetAlert


## How to use this Project ☑️

1. Clone this repository :

```bash
  git clone https://github.com/username/intermart.git
```
Replace the username with your GitHub username.

2. Import database from intermart.sql file

3. Set up the database connection in the koneksi.php file:

```bash
  $koneksi = mysqli_connect("localhost", "root", "", "intermart");
```

4. Enter the intermart directory :
```bash
  cd intermart
```

5. Install the dependencies :
```bash
  npm install
```

6. Tun tailwindcss :
```bash
  npm run dev
```

7. Run the project using a local server such as XAMPP or Laragon.
8. Access the project through a browser:
```bash
  http://localhost/intermart/
```
   

    
