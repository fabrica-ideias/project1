<form  class="col s12 m12 l12" name="fCadastro" id="fCadastro">
  <div class="row">
    <div class="col s4 m5 l4"></div>
    <div class="col s4 m2 l4 z-depth-4" id="imgNewUser">
          <input type="file" onchange="uploadFoto(this)" accept="image/*" class="fileImg" name="file" id="file">
          <label style="display: none">Selecione uma imagem</label>
    </div>
    <div class="col s4 m5 l4"></div>
  </div>  
  <div class="row" >
    <form class="col s12">
      <div class="row">
       <div class="input-field col s6">
          <input id="nome" type="text" onkeydown="javascript:EnterTab('sobrenome',event)" class="validate">
          <label for="last_name">Nome</label>
        </div>
        <div class="input-field col s6">
          <input id="sobrenome" type="text" onkeydown="javascript:EnterTab('emailUser',event)" class="validate">
          <label for="last_name">Sobrenome</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="emailUser" type="email" onkeydown="javascript:EnterTab('senhaUser',event)" class="validate">
          <label for="emailUser">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="senhaUser" type="password" class="validate">
          <label for="senhaUser">Senha</label>
        </div>
      </div>
      <dir class="row">
            <div class="col s12">
                  <a class="btn" id="salvaUsuario">PRÓXIMO</a>
            </div>
      </dir>
    </form>
  </div>
</form>