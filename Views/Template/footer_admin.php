
    
    <script src="<?php echo JS ?>/jquery-3.3.1.min.js"></script>
    <script src="<?php echo JS ?>/popper.min.js"></script>
    <script src="<?php echo JS ?>/bootstrap.min.js"></script>    
    <script>const BASEURL = "<?= BASE_URL?>";</script>
    <script src="<?php echo JS ?>/main.js"></script>  
    <script type="text/javascript" src="<?php echo JS ?>/plugins/sweetalert.min.js">
    <script src="<?php echo JS ?>/plugins/pace.min.js"></script>
  
    <?php if($data['page_name']=="Rol_users") {?>
    
      
        <script type="text/javascript" src="<?php echo JS ?>/plugins/bootstrap-notify.min.js"></script>
        

          <script type="text/javascript" src="<?php echo JS ?>/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo JS ?>/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo JS ?>/functionRoles.js"></script>
      <?php };?>
    <?php if($data['page_name']=="Usuarios") {?>
      <script src="<?php echo JS ?>/functionUsuarios.js"></script>
      <script src="<?php echo JS ?>/functionAdmin.js"></script>
      <script src="<?php echo JS ?>/plugins/js/bootstrap-select.min.js"></script>
      <script type="text/javascript" src="<?php echo JS ?>/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo JS ?>/plugins/dataTables.bootstrap.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
       
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
       <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
      
      
      <?php };?>

  