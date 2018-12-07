<?php
echo '  <div class="row-fluid" style="border-style: inset;border-radius: 20px">    
                <footer class="span12" style="border-style: inset;border-radius: 20px">
                    <p>
                        <small>
                            Tous droits reserv&eacutes &copy UR-ABAQ-2018
                        </small>
                    </p>
                </footer>
            </div>

         

                <script src="js/jquery-latest.js"> </script>
                <script src="js/bootstrap.min.js"> </script>
                <script src="js/bootstrap-datepicker.js"></script>
                <script src="js/jquery.js"> </script>
                <script src="js/jquery.min.js"> </script>
                <script src="js/jquery-ui.js"> </script>
                <script src="js/jquery-1.9.1.js"> </script>
                <script type="text/javascript" src="dist/jstree.min.js"> </script>  
                <script type="text/javascript" src=" js/jquery.dataTables.js"> </script> 
                <script type="text/javascript" src=" dist/jstree.min.js"> </script>

                <script>
	           $(".carousel").carousel({
                   interval: 2000
                   })
                </script>

                
                <script>
                    $(function() {
                        $("#jstree_demo_div").jstree();
                    });
                    $("#jstree_demo_div").on("changed.jstree", function(e, data) {
                        console.log(data.selected);
                    });
                    $("button").on("click", function() {
                        $("#jstree").jstree(true).select_node("child_node_1");
                        $("#jstree").jstree("select_node", "child_node_1");
                        $.jstree.reference("#jstree").select_node("child_node_1");
                    });

                    $(function() {
                        $("#tab").dataTable({
                            "oPaginate": "two_numbers",
                            "oLanguage": {
                                "sProcessing": "Traitement en cours...",
                                "sLengthMenu": "Afficher _MENU_ lignes /page",
                                "sZeroRecords": "Aucune donn&eacute;e &agrave; afficher",
                                "sInfo": "Affichage : _START_ - _END_ / _TOTAL_ ligne(s)",
                                "sInfoEmpty": "Aucune ligne!",
                                "sInfoFiltered": "(0 / _MAX_ ligne(s) au total)",
                                "sInfoPostFix": "",
                                "sSearch": "Recherche",
                                "sUrl": "",
                                "oPaginate": {
                                    "sFirst": "Premier",
                                    "sPrevious": "Pr&eacute;c&eacute;dent",
                                    "sNext": "Suivant",
                                    "sLast": "Dernier"
                                }
                            },
                            "sScrollX": "100%",
                            //"sScrollXInner": "90%",
                            "bJQueryUI": true
                        });

                    });
                </script>
            
        </div>




</body>

</html>     
            ';
?>