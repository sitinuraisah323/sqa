<?php
class Pdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/TCPDF-6.2.26/tcpdf.php';
    }
}