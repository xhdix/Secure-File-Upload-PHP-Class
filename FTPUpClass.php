/******************************* 
		XHDIX@YAHOO.COM -- 2014 -2015
*******************************/

<?php
class ftpfileup {

  private $host = 'example.com';
  private $usr = 'user@example.com';
  private $pwd = 'password';

	private $ffileArray = array();
	private $fperfix = '';
	private $fuserid = 0;
	private $fname ='';
	private $fdate = '';
	private $frandnam = 0;
	private $ftype = '';
	private $fpatch = '';
	private $flimitsize = 1073741824;
	private $flimitnumber = 1;
	private $fchmode = '0644';
	private $fisadmin= false;
	private $validmimtype=array();
	private $fsetname = '';
	private $ffullname = '';
	private $fmime = '';
	private $fsize = 0;
	private $fmimes = array(
			// Image formats
			'jpg|jpeg|jpe'                 => 'image/jpeg',
			'gif'                          => 'image/gif',
			'png'                          => 'image/png',
			'bmp'                          => 'image/bmp',
			'tif|tiff'                     => 'image/tiff',
			'ico'                          => 'image/x-icon',

			// Video formats
			'asf|asx'                      => 'video/x-ms-asf',
			'wmv'                          => 'video/x-ms-wmv',
			'wmx'                          => 'video/x-ms-wmx',
			'wm'                           => 'video/x-ms-wm',
			'avi'                          => 'video/avi',
			'divx'                         => 'video/divx',
			'flv'                          => 'video/x-flv',
			'mov|qt'                       => 'video/quicktime',
			'mpeg|mpg|mpe'                 => 'video/mpeg',
			'mp4|m4v'                      => 'video/mp4',
			'ogv'                          => 'video/ogg',
			'webm'                         => 'video/webm',
			'mkv'                          => 'video/x-matroska',
			
			// Text formats
			'txt|asc|c|cc|h'               => 'text/plain',
			'csv'                          => 'text/csv',
			'tsv'                          => 'text/tab-separated-values',
			'ics'                          => 'text/calendar',
			'rtx'                          => 'text/richtext',
			'css'                          => 'text/css',
			'htm|html'                     => 'text/html',
			
			// Audio formats
			'mp3|m4a|m4b'                  => 'audio/mpeg',
			'ra|ram'                       => 'audio/x-realaudio',
			'wav'                          => 'audio/wav',
			'ogg|oga'                      => 'audio/ogg',
			'mid|midi'                     => 'audio/midi',
			'wma'                          => 'audio/x-ms-wma',
			'wax'                          => 'audio/x-ms-wax',
			'mka'                          => 'audio/x-matroska',
			
			// Misc application formats
			'rtf'                          => 'application/rtf',
			'js'                           => 'application/javascript',
			'pdf'                          => 'application/pdf',
			'swf'                          => 'application/x-shockwave-flash',
			'class'                        => 'application/java',
			'tar'                          => 'application/x-tar',
			'zip'                          => 'application/zip',
			'gz|gzip'                      => 'application/x-gzip',
			'rar'                          => 'application/rar',
			'7z'                           => 'application/x-7z-compressed',
			'exe'                          => 'application/x-msdownload',
			
			// MS Office formats
			'doc'                          => 'application/msword',
			'pot|pps|ppt'                  => 'application/vnd.ms-powerpoint',
			'wri'                          => 'application/vnd.ms-write',
			'xla|xls|xlt|xlw'              => 'application/vnd.ms-excel',
			'mdb'                          => 'application/vnd.ms-access',
			'mpp'                          => 'application/vnd.ms-project',
			'docx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'docm'                         => 'application/vnd.ms-word.document.macroEnabled.12',
			'dotx'                         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
			'dotm'                         => 'application/vnd.ms-word.template.macroEnabled.12',
			'xlsx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'xlsm'                         => 'application/vnd.ms-excel.sheet.macroEnabled.12',
			'xlsb'                         => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
			'xltx'                         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
			'xltm'                         => 'application/vnd.ms-excel.template.macroEnabled.12',
			'xlam'                         => 'application/vnd.ms-excel.addin.macroEnabled.12',
			'pptx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
			'pptm'                         => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
			'ppsx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
			'ppsm'                         => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
			'potx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.template',
			'potm'                         => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
			'ppam'                         => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
			'sldx'                         => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
			'sldm'                         => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
			'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
			
			// OpenOffice formats
			'odt'                          => 'application/vnd.oasis.opendocument.text',
			'odp'                          => 'application/vnd.oasis.opendocument.presentation',
			'ods'                          => 'application/vnd.oasis.opendocument.spreadsheet',
			'odg'                          => 'application/vnd.oasis.opendocument.graphics',
			'odc'                          => 'application/vnd.oasis.opendocument.chart',
			'odb'                          => 'application/vnd.oasis.opendocument.database',
			'odf'                          => 'application/vnd.oasis.opendocument.formula',
			
		);
	
	
	
	private function getMimetype($fileext) {
		
		$mime = false;
		foreach ($this->fmimes as $type => $mime) {
			if (stripos($type, $fileext) !== false) {
			  return $mime;
			  
			}
		}
	}
	private function setfullname() {
		if ($this->fisadmin == true ) {
			$this->fsetname = $this->fperfix . '-' . $this->fuserid . '-' . $this->fname . '-' . $this->fdate . '-' . $this->frandnam . '.' . $this->ftype;

		}else {
			$this->fsetname = $this->fperfix . '-' . $this->fuserid . '-' . $this->fdate . '-' . $this->frandnam . '.' . $this->ftype;

		}
		$this->ffullname = $this->fpatch . $this->fsetname ;
		return true;
	
	}
	public function uploadstat() {
		try {
    
			// Undefined | Multiple Files | $_FILES Corruption Attack
			// If this request falls under any of them, treat it invalid.
			if (
				!isset($this->ffileArray['error']) ||
				is_array($this->ffileArray['error'])
			) {
				throw new RuntimeException('Invalid parameters.');
			}

			// Check $_FILES['upfile']['error'] value.
			switch ($this->ffileArray['error']) {
				case UPLOAD_ERR_OK:
					break;
				case UPLOAD_ERR_NO_FILE:
					throw new RuntimeException('No file sent.');
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					throw new RuntimeException('Exceeded filesize limit.');
				default:
					throw new RuntimeException('Unknown errors.');
			}
			
			$local_file = $this->ffileArray['tmp_name'];
			
			// You should also check filesize here. 
			$this->fsize = @filesize($local_file);
			if ($this->fsize > $this->flimitsize) {
				throw new RuntimeException('Exceeded filesize limit.');
			}
//echo serialize($this->validmimtype);
			// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
			// Check MIME Type by yourself.
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $this->ftype = array_search(
				$finfo->file($local_file),
				$this->validmimtype,
				true
			)) {
				throw new RuntimeException('Invalid file format.');
			}

			
			$this->setfullname();
			// You should name it uniquely.
			// DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
			// On this example, obtain safe unique name from its binary data.
			/* if (!move_uploaded_file(
				$local_file,
				$this->ffullname
				
			)) {
				throw new RuntimeException('Failed to move uploaded file.');
			} */
			
			// file to move:

			$ftp_path = $this->ffullname;
			 
			// connect to FTP server (port 21)
			$conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
			 
			// send access parameters
			ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
			
			$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_BINARY);// upload the file
			if (!$upload) {// check upload status
				echo "FTP upload of $ftp_path has failed!";
				throw new RuntimeException('FTP upload Failed.');
			} else {
				//echo "Uploaded $file to $conn_id as $ftp_path";
			}
			
			// try to chmod the new file to 666 (writeable)
			if (ftp_chmod($conn_id, octdec($this->fchmode) , $ftp_path) !== false) {
				//print $ftp_path . " chmoded successfully to 666\n";
			} else {
				echo "could not chmod $file\n";
				throw new RuntimeException('FTP could not chmod.');
			}
			 
			// close the FTP stream
			ftp_close($conn_id);
			
			$this->getretmime();
			$strsize =sizetomega($this->fsize);
			return array($this->fsetname, $this->fmime, $strsize);
			//echo 'File is uploaded successfully.';

		} catch (RuntimeException $e) {

			echo $e->getMessage();
			return false;

		}
		
	
	
	
	}



	public function fclient($perfix,$userid) {
		$this->fperfix = $perfix;
		$this->fuserid = $userid;
		$this->frandnam = rand(111111,999999);
		$this->fisadmin = false;
		$this->fdate = date('YmdHis');
	}

	public function fadmin($perfix,$userid,$name) {
		$this->fperfix = $perfix;
		$this->fuserid = $userid;
		$this->fname = $name;
		$this->frandnam = rand(111111,999999);
		$this->fisadmin = true;
		$this->fdate = date('YmdHis');




	}


	public function ftypes($tArg='', $deflt=true) {
		
		//echo serialize ($tArg);
		if ($deflt == true) 
			$tArg= array('ppsx','pptx','xlsx','xls','pps','ppt','zip','rtf','csv','txt','jpg','png','doc','docx','pdf');
			
		if ((is_string($tArg)) && ($deflt == false)) {
			$mimT = $this->getMimetype($tArg);
			if ($mimT !== false) {
				$this->validmimtype[$tArg]= $mimT;
			}else {
				//error
				echo 'error s';
			}
			
		}else {
			foreach ($tArg as $Tx){
				$mimT = $this->getMimetype($Tx);
				if ($mimT !== false) {
					$this->validmimtype[$Tx]= $mimT;
				}else {
					//error
					echo 'error a';
				}
			}
		}
	
		
	}

	public function ffile($fArg) {
	
		$this->ffileArray = $fArg;
		
	}
	public function fpatch($pArg) {
	
		$this->fpatch = $pArg;
		
	}
	public function flimitsize($slArg) {
	
		$this->flimitsize = sizetobyte($slArg);
		
	}
	public function fchmode($chArg) {
	
		$this->fchmode = '0' . $chArg;
		
	}
	private function getretmime() {
		foreach ($this->validmimtype as $type => $mime) {
			if (stripos($type, $this->ftype) !== false) {
				$this->fmime = $mime;
				return true;
			}
		}
		return false;
		
	}
	private function sizetomega($sbyte) {
		 if ($sbyte >= 1073741824)
        {
            $sbyte = number_format($sbyte / 1073741824, 2) . ' GB';
        }
        elseif ($sbyte >= 1048576)
        {
            $sbyte = number_format($sbyte / 1048576, 2) . ' MB';
        }
        elseif ($sbyte >= 1024)
        {
            $sbyte = number_format($sbyte / 1024, 2) . ' KB';
        }
        elseif ($sbyte > 1)
        {
            $sbyte = $sbyte . ' Bytes';
        }
        elseif ($sbyte == 1)
        {
            $sbyte = $sbyte . ' byte';
        }
        else
        {
            $sbyte = '0 size';
        }

        return $sbyte;
		
	}
	private function sizetobyte($smbyte) {
		$bnumber=substr($smbyte,0,-2);
		switch(strtoupper(substr($smbyte,-2))){
			case "KB":
            return $bnumber*1024;
			case "MB":
            return $bnumber*pow(1024,2);
			case "GB":
            return $bnumber*pow(1024,3);
			default:
            return $smbyte;
		}
		
	}
	
	
	
}


?>
