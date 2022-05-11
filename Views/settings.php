<h3> Alterar Username</h3>
<br>
<form action="index.php?r=change/acc" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username:</label>
                <input type="text" class="form-control" id="inputUsername" name="user" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Alterar Username</button>
        </div>
    </form>

    <br>

    <form action="index.php?r=change/acc" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username:</label>
                <input type="password" class="form-control" id="inputUsername" name="pass" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Alterar Password</button>
        </div>
    </form>