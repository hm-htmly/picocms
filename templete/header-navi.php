
        <nav>
            <ul>
                <li><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li><a href="<?php echo BASEURL; ?>artikel/123665">Artikel 1</a></li>
                <li><a href="<?php echo BASEURL; ?>otto">Otto</a></li>
                <?php if(isset($_COOKIE['login'])) : ?>
                    <li><a href="<?php echo BASEURL; ?>admin/global">Admin</a></li>
                    <li><a class="login" href="#">abmelden</a></li>
                <?php else : ?>
                    <li><a class="login" href="#">anmelden</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <script type="text/javascript">
            let linForm;
            let checkUser;
            let setJSON;
            (function() {
                linForm = function() {
                    let content = "<p><label>E - Mail</label>";
                    content += "<input type='text' id='mail'>";
                    content += "<label>Passwort</label>";
                    content += "<input type='password' id='pwd'></p>";

                    let btn = "<button onclick=\"$('#msgWinOut').remove();\">abbrechen</button>";
                    btn += "<button onclick=\"checkUser();\">ok</button>";

                    msgOpen('Anmeldung',content,btn);
                }
                $('.login').on('click', function() {
                    if($(this).text() == 'anmelden') {
                        linForm();
                    }
                });

                setJSON = function(data) {
                    let mail = data.mail;
                    alert(mail)
                }

                checkUser = function() {
                    if(!$('#mail').val() || !$('#pwd').val()) {
                        let content = "<p>Bitte füllen Sie das Formular komplett aus.</p>";
                        let btn = "<button onclick=\"linForm();\">ok</button>";

                        $('#msgWinOut').remove();

                        msgOpen('Achtung',content,btn);
                    } else {
                        fetch("data/user.json").then( function(response) {
                            return response.json();
                        }).then( function(data) {
                            setJSON(data);
                        }).catch( function(error) {
                            alert("Error: "+error);
                        });
                    }
                }

                setJSON = function(data) {
                    let mail = data.mail;
                    let pwd = data.password;
                    alert(typeof data+" \n"+mail+ "\n"+pwd)
                }
            })();
        </script>
