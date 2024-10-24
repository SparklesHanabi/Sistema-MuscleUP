<?php
class UsuarioDTO
{
    private $idUsu;
    private $nomeUsu;
    private $senhaUsu;
    private $telefoneUsu;
    private $emailUsu;
    private $perfilUsu;
    private $situacaoUsu;


    public function setSituacaoUsu($situacaoUsu)
    {
        $this->situacaoUsu = $situacaoUsu;
    }
    public function getSituacaoUsu()
    {
        return $this->situacaoUsu;
    }
    //
    public function setTelefoneUsu($telefoneUsu)
    {
        $this->telefoneUsu = $telefoneUsu;
    }
    public function getTelefoneUsu()
    {
        return $this->telefoneUsu;
    }
    //
    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;
    }
    public function getIdUsu()
    {
        return $this->idUsu;
    }
    //
    public function setNomeUsu($nomeUsu)
    {
        $this->nomeUsu = $nomeUsu;
    }
    public function getNomeUsu()
    {
        return $this->nomeUsu;
    }
    public function setSenhaUsu($senhaUsu)
    {
        $this->senhaUsu = $senhaUsu;
    }
    public function getSenhaUsu()
    {
        return $this->senhaUsu;
    }
    public function setEmailUsu($emailUsu)
    {
        $this->emailUsu = $emailUsu;
    }
    public function getEmailUsu()
    {
        return $this->emailUsu;
    }
    public function setPerfilUsu($perfilUsu)
    {
        $this->perfilUsu = $perfilUsu;
    }
    public function getPerfilUsu()
    {
        return $this->perfilUsu;
    }
}
