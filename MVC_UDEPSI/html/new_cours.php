
<html>
<h1> Vous voulez donnez un cours ?</h1>
<form method="post" action="../controller/insert_cours.php">
    <p>
        <label for="datecours">La date de votre cours :</label>
        <input type="date" name="datecours" id="datecours">
    </p>
    <p>
        <label for="horaire">l'horaire de votre cours :</label>
        <input type="text" name="horaire" id="horaire"></p>
    <p>
        <label for="texte_cours">Présentez votre cours :</label>
    </br>
        <textarea type="Longtext" name="texte_cours" id="texte_cours" rows="10" cols="50" />
        </textarea>
    </p>
    <p>
        <label for="competence"> Sur quel compétence va principalement porter votre cours</label>
        <select name="competence" id="competence">
            <option value="1">PHP WEB</option>
            <option value="2">HTML</option>
            <option value="3">CSS</option>
            <option value="4">CMS</option>
            <option value="5">JavaScript</option>
            <option value="6">C#</option>
            <option value="7">C++</option>
            <option value="8">C</option>
            <option value="9">JAVA</option>
            <option value="10">PHP OBJET</option>
            <option value="11">IOS</option>
            <option value="12">Android</option>
            <option value="13">UML</option>
            <option value="14">Merise</option>
            <option value="15">TCP/IP</option>
            <option value="16">Firewall</option>
            <option value="17">NAT/PAT</option>
        </select>
    </p>

    <input type="submit">

</form>



</html>
