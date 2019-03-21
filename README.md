# Secure-File-Upload-PHP-Class
Secure File Upload PHP Class + FTP File Upload
## How to use

```PHP
require_once('./FTPUpClass.php');
.
.
.
$fupa = new ftpfileup();
$fupa->ftypes('', true); // default or use specific file type:  $fupa->ftypes(array('zip','pdf','doc'),false);
$fupa->ffile($_FILES['file']);
$fupa->fpatch('./files/up/dir/');
$fupa->flimitsize(1000000); // in byte
$fupa->fchmode(644);
$fupa->fadmin('up',1,'newname'); // (prefix,userID,newEnName) ==>> up-1-newname-[time]-[randnumb].[filetype]

$fn = $fupa->uploadstat();

if ($fn[2]==0 || $fn[2]== null || $fn === false) {
  echo "Upload fiald"
}else {
  echo 'NEW Name: ' . $fn[0] . ' mimetype: ' . $fn[1] . ' size: '. $fn[2];
}
```

### Old code but good
