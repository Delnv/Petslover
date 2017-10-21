---
title: Crie uma nova senha
layout: login
---
<div class="ls-login-box">
  <h1 class="ls-login-logo"><%= image_tag "locastyle/logo-locaweb.jpg", title: "Logo login" %></h1>
  <h2 class="ls-title-5">Crie uma nova senha</h2>
  <p>Por segurança, você deve criar uma senha com no mínimo <strong>6 caracteres</strong>. Utilize letras e números ou caracteres especiais.</p>
  <hr class="ls-no-border">
  <form role="form" class="ls-form ls-login-form" action="#">
    <fieldset>

      <label class="ls-label">
        <b class="ls-label-text">Nova senha</b>
        <div class="ls-prefix-group">
          <input id="new-password-field" class="ls-field-lg" type="password" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#new-password-field" href="#"></a>
        </div>
      </label>

      <label class="ls-label">
        <b class="ls-label-text">Confirme a nova senha</b>
        <div class="ls-prefix-group">
          <input id="confirm-new-password-field" class="ls-field-lg" type="password" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#confirm-new-password-field" href="#"></a>
        </div>
      </label>

      <div class="ls-form-actions">
        <input type="submit" value="Salvar" class="ls-btn-primary">
        <a href="#" class="ls-btn">Cancelar</a>
      </div>

    </fieldset>
  </form>
</div>
