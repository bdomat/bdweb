<div id="bdweb-module">
    <div class="bdweb-logo">
        <img src="{$my_logo_url}">
    </div>
    <div class="bdweb-text">
        <p>{$my_contact_details|nl2br}</p>
    </div>
</div>



<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var moduleElement = document.getElementById('bdweb-module');
    var targetElement = document.getElementById('dashboard');

    if (moduleElement && targetElement) {
        targetElement.appendChild(moduleElement);
    }
});
</script>
