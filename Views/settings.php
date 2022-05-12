<form action="index.php?r=change/acc" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Novo email</label>
                <input type="email" class="form-control" id="inputUsername" name="email" required> 
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Alterar email</button>
            </form>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Nova Pass:</label>
                <input type="text" class="form-control" id="inputPassword" name="pass" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Alterar password</button>
        </div>
    </form>