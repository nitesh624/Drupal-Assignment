<?php
// contact.php 20151015 (C) 2015 Mark Constable <markc@renta.net> (AGPL-3.0)

return '
      <h2>Email Contact Form</h2>' . $t->contact() . '
      <script>
function mailform(form) {
  location.href = "mailto:' . $g->cfg['email'] . '"
    + "?subject=" + encodeURIComponent(form.subject.value)
    + "&body=" + encodeURIComponent(form.message.value);
  form.subject.value = "";
  form.message.value = "";
  alert("Thank you for your message. We will get back to you as soon as possible.");
  return false;
}
      </script>';
