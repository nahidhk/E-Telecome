<form action="" method="post">
    <table>
        <tr>
            <td>
                <label for="name">Name:</label>
            </td>
            <th>
                <input type="text" class="input" name="name" placeholder="Engineer Name" required>
            </th>
        </tr>
        <tr>
            <td>
                <label for="title">Title:</label>
            </td>
            <th>
                <input type="text" class="input" name="title" placeholder="Title and bio" required>
            </th>
        </tr>
        <tr>
            <td>
                <label for="address">Address:</label>
            </td>
            <th>
                <input type="address" class="input" name="address" placeholder="Address...." required>
            </th>
        </tr>
        <tr>
            <td>
                <label for="email">Email:</label>
            </td>
            <th>
                <input type="email" class="input" name="email" placeholder="username@exampule.com" required>
            </th>
        </tr>
        <tr>
            <td>
                <label for="phone">Phone:</label>
            </td>
            <th>
                <input type="number" class="input" name="phone" placeholder="+88018000000000" required>
            </th>
        </tr>
        <tr>
            <td>
                <label for="profile_image">Profile Image :</label>
            </td>
            <th>
                <img src="" id="previweImg10" alt="NdSQL web System" class="settingImg"><br>
                <div class="flex center medel">
                    <input oninput="imgChenger({inputTagID: 'profile_image' , imgTagID: 'previweImg10'})"
                        id="profile_image" name="profile_image" type="text" value="" class="input">
                    <div class="gBtn flex center medel" onclick="openGallery('profile_image')">
                        <i class="fa-regular fa-images"></i>
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <td>
                <label for="skills">Experience :</label>
            </td>
            <th>

                <div class="flex center medel">
                    <input id="exInData" type="text" class="input" placeholder="Experience">

                    <div onclick="addExInData()" class="gBtn flex center medel">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </div>
                <input id="exOutData" class="input" type="text" name="skills" readonly
                    placeholder="The Experience Show">

                <script>
                // Keep the running list in memory instead of re-parsing the hidden field each time
                let skillsList = [];

                function addExInData() {
                    const inElement = document.getElementById('exInData');
                    const outElement = document.getElementById('exOutData');

                    const value = inElement.value.trim();
                    if (!value) return; // ignore empty input
                    if (skillsList.includes(value)) { // avoid duplicates (optional)
                        inElement.value = '';
                        return;
                    }

                    skillsList.push(value);
                    outElement.value = JSON.stringify(skillsList); // safe, properly escaped JSON

                    inElement.value = ''; // clear input for the next entry
                    inElement.focus();
                }
                </script>

                </div>
            </th>
        <tr>
            <td>
                <label for="socials">Socials</label>
            </td>
            <th>
                <input type="text" id="output" name="socials">
                <div class="flex medel center">
                    <i class="fa-brands fa-github inputIcon"></i>
                    <input onchange="usecngfun()" oninput="usecngfun()" id="github" type="url" class="input"
                        placeholder="https://github.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-facebook inputIcon"></i>
                    <input onchange="usecngfun()" oninput="usecngfun()" id="facebook" type="url" class="input"
                        placeholder="https://www.facebook.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-square-x-twitter inputIcon"></i>
                    <input onchange="usecngfun()" oninput="usecngfun()" id="x" type="url" class="input"
                        placeholder="https://x.com/username">
                </div>
                <div class="flex medel center">
                    <i class="fa-brands fa-linkedin inputIcon"></i>
                    <input onchange="usecngfun()" oninput="usecngfun()" id="linkedin" type="url" class="input"
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
            Publish Card
        </button>
    </div>
</form>