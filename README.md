
# Intermart 

**Intermart** is a web-based stock management application created as part of the BeSmart activities of Intermedia SMEs. This application is equipped with an item data CRUD feature and QR Code integration for more efficient stock management.


## Demo




## Technology
<p><a target="_blank" href="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" style="display: inline-block;"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="42" height="42" /></a>
<a target="_blank" href="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" style="display: inline-block;"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="42" height="42"/></a>
<a target="_blank" href="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" style="display: inline-block;"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="42" height="42"  style="margin-left:10px;"/></a>
<a target="_blank" href="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" style="display: inline-block;"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="42" height="42" /></a>
<a target="_blank" href="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" style="display: inline-block;"><img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="42" height="42" /></a>
<a target="_blank" href="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" style="display: inline-block;"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="42" height="42" /></a></p>

- SweetAlert for interactive notifications  ([SweetAlert](https://sweetalert2.github.io/))
- Flowbit for popup modal ([Flowbite](https://flowbite.com/))
- phpqrcode for generate qr ([phpqrcode](https://sourceforge.net/projects/phpqrcode/))

## Features
- User Login & Register
- Item data management (Add, Change, Delete)
- Item search
- History of data changes, deletions and additions
- Scan QR Code to enter and reduce stock items
- Interactive notifications with SweetAlert


## How to use this Project

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

    
