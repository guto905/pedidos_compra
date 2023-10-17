<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config['jwt_key'] = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Jl1wlZEb2sTgEjaQ2qOPH2mfRyeITdtkpNoAGry1PBs';
$config['token_timeout'] = 60 * 60 * 24; // Tempo de expiração do token em segundos (neste caso, 24 horas)
