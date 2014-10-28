<?php  
$html = $this->fetch('content');
$pdf->writeHTML($html,true,false,true,false,'');
$pdf->Output('example.pdf','D');

?>