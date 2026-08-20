<?php
    include "./hader.php";
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ndsql_update_developer($id, $_POST);
    header("Location: /ndsql-admin/engCard.php?i=engCard.php");
    exit;
    }
    $cardData = ndsql_get_developer($id);

?>


<div class="box">
    <div class="flex medel">
        <div onclick="callBack()" class="backBtn">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <h2>
            Edit Card info
        </h2>
    </div>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="name">Name:</label>
                </td>
                <th>
                    <input type="text" class="input" name="name" placeholder="Engineer Name"
                        value="<?php echo $cardData['name'] ?>" required>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="title">Title:</label>
                </td>
                <th>
                    <input type="text" class="input" name="title" placeholder="Title and bio"
                        value="<?php echo $cardData['title'] ?>" required>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="address">Address:</label>
                </td>
                <th>
                    <input type="address" class="input" name="address" placeholder="Address...."
                        value="<?php echo $cardData['address'] ?>" required>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <th>
                    <input type="email" class="input" name="email" placeholder="username@exampule.com"
                        value="<?php echo $cardData['email'] ?>" required>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone:</label>
                </td>
                <th>
                    <input type="number" class="input" name="phone" placeholder="+88018000000000"
                        value="<?php echo $cardData['phone'] ?>" required>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="profile_image">Profile Image :</label>
                </td>
                <th>
                    <img src="<?php echo $cardData['profile_image'] ?>" id="previweImg10" alt="NdSQL web System"
                        class="settingImg"><br>
                    <div class="flex center medel">
                        <input placeholder="Image"
                            oninput="imgChenger({inputTagID: 'profile_image' , imgTagID: 'previweImg10'})"
                            id="profile_image" name="profile_image" type="text"
                            value="<?php echo $cardData['profile_image'] ?>" class="input">
                        <div class="gBtn flex center medel" onclick="openGallery('profile_image')">
                            <i class="fa-regular fa-images"></i>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <td>
                    <label>Experience :</label>
                </td>
                <th>
                    <input type="text" id="jsonSkills" name="skills" class="hidden">
                    <div class="flex styleBox wrap" id="sData"></div>
                    <div class="flex center medel">
                        <input placeholder="Add Topic" class="input" type="text" id="topicInput">
                        <button type="button" class="btn" onclick="addNewTopic()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <script>
                    const sData = document.getElementById('sData');
                    const jsonSkillsInput = document.getElementById('jsonSkills');
                    let skills = <?php echo json_encode($cardData['skills']); ?>;



                    function addNewTopic() {
                        const value = topicInput.value.trim();
                        if (value === '') return;

                        skills.push(value);
                        topicInput.value = '';
                        renderSkills();
                        topicInput.focus();
                    }


                    function renderSkills() {
                        sData.innerHTML = skills.map((item, index) =>
                            `<div class='topic' data-index="${index}">${item} <i class="fa-solid fa-xmark removeTopic"></i></div>`
                        ).join('');
                        jsonSkillsInput.value = JSON.stringify(skills);
                    }

                    // Event delegation — parent-এ একটাই listener, কিন্তু সব child-এর click ধরবে
                    sData.addEventListener('click', function(e) {
                        if (e.target.classList.contains('removeTopic')) {
                            const index = e.target.closest('.topic').dataset.index;
                            skills.splice(index, 1);
                            renderSkills();
                        }
                    });

                    renderSkills();
                    </script>
                </th>
            </tr>
            <td>
                <label for="socials">Socials</label>
            </td>
            <th>
                <input type="text" class="hadden" id="output" value="<?php echo json_encode($cardData['socials']) ?>"
                    name="socials" placeholder="JSON show Data" readonly>

                <div class="flex medel center">
                    <i class="fa-brands fa-github inputIcon"></i>
                    <input value="<?php echo $cardData['socials']['github'] ?>" onchange="usecngfun()"
                        oninput="usecngfun()" id="github" type="text" class="input"
                        placeholder="https://github.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-facebook inputIcon"></i>
                    <input value="<?php echo $cardData['socials']['facebook'] ?>" onchange="usecngfun()"
                        oninput="usecngfun()" id="facebook" type="text" class="input"
                        placeholder="https://www.facebook.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-square-x-twitter inputIcon"></i>
                    <input value="<?php echo $cardData['socials']['twitter'] ?>" onchange="usecngfun()"
                        oninput="usecngfun()" id="x" type="text" class="input" placeholder="https://x.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-linkedin inputIcon"></i>
                    <input value="<?php echo $cardData['socials']['linkedin'] ?>" onchange="usecngfun()"
                        oninput="usecngfun()" id="linkedin" type="text" class="input"
                        placeholder="https://linkedin.com/username">
                </div>
                <script>
                function usecngfun() {
                    const facebook = document.getElementById('facebook').value;
                    const github = document.getElementById('github').value;
                    const x = document.getElementById('x').value;
                    const linkedin = document.getElementById('linkedin').value;
                    const myson = {
                        github: github || "#",
                        facebook: facebook || "#",
                        twitter: x || "#",
                        linkedin: linkedin || "#"
                    }
                    document.getElementById('output').value = JSON.stringify(myson);
                }
                </script>
            </th>
            </tr>



        </table>
        <div class="flex center medel">
            <button class="btn" type="submit">
                Upadte Card
            </button>
        </div>
    </form>

</div>






<?php
    include "./footer.php";

?>