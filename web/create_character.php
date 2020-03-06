<html>
<head>
<title>Character Creation</title>
<style>
h1 {
    text-align: center;
    background-color:teal;
    font-family: Book Antiqua;
    border-color: black;
    border-style: solid;
    color: white;
    text-shadow:
    -1px -1px 0 #000,
    1px -1px 0 #000,
    -1px 1px 0 #000,
    1px 1px 0 #000; 
}
</style>
</head>
<body style="background-color:gray;">
    <h1>Create your Character!</h1>
    <form action="insert_character.php" method="post">
  <label for="character_name">Character Name</label>
  <input type="text" id="character_name" name="character_name"><br><br>
  <label for="race">Character Race</label>
  <select id="race" name='race'>
  <option value="race">Dwarf</option>
  <option value="race">Elf</option>
  <option value="race">Human</option>
  <option value="race">Orc</option>
  </select> <br><br>
  <label for="character_description">Character Description</label> <br>
  <textarea id="character_description" rows="4" cols="50" name="character_description">Enter your character description here!</textarea>
  <br><br>
  <button type="button" onclick="rollRandomStats()">Roll Stats!</button>
  <br><br>
  <label for="strength">STR</label>
  <input type="text" id="strength" name="strength" readonly><br><br>
  <label for="dexterity">DEX</label>
  <input type="text" id="dexterity" name="dexterity" readonly><br><br>
  <label for="constitution">CON</label>
  <input type="text" id="constitution" name="constitution" readonly><br><br>
  <label for="intelligence">INT</label>
  <input type="text" id="intelligence" name="intelligence" readonly><br><br>
  <label for="wisdom">WIS</label>
  <input type="text" id="wisdom" name="wisdom" readonly><br><br>
  <label for="charisma">CHA</label>
  <input type="text" id="charisma" name="charisma" readonly><br><br>
  <input type="submit" value="Submit">
</form>
<script>
function rollRandomStats() {
  min = Math.ceil(1);
  max = Math.floor(20);
  document.getElementById("strength").value = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById("dexterity").value = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById("constitution").value = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById("intelligence").value = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById("wisdom").value = Math.floor(Math.random() * (max - min)) + min;
  document.getElementById("charisma").value = Math.floor(Math.random() * (max - min)) + min;
}
</script>
</body>
</html>