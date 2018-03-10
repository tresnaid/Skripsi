<div id="parent" style="border: 1px solid red; padding: 10px;">
     <div id="child" style="border: 1px solid green; padding: 10px;">
           I am a child div within the parent div.
     </div>
          <input type="button" value="Remove Element" onClick="removeElement('parent','child');">
          <script type="text/javascript">
               function removeElement(parentDiv, childDiv){
                    if (document.getElementById(childDiv)) {     
                         var child = document.getElementById(childDiv);
                         var parent = document.getElementById(parentDiv);
                         parent.removeChild(child);
                    }
                    
               }
          </script>
</div>
<p>&nbsp;</p>
<?php 
     $count = 0;
 ?>

<?php echo $count ?>