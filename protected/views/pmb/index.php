<?php
$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
       'Persyaratan'=>array('id'=>'test-id1','content'=>$this->renderPartial(
										'_info',NULL,TRUE
										)),        
        'Panduan'=>array('id'=>'test-id2','content'=>$this->renderPartial(
										'_panduan',NULL,TRUE
										)),

        
        
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
    'id'=>'MyTab-Menu',
));
?>
