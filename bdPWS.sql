CREATE TABLE Iva (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  percentagem VARCHAR(45) NULL,
  descricao VARCHAR(45) NULL,
  vigor VARCHAR(45) NULL,
  PRIMARY KEY(id)
);


CREATE TABLE Utilizador (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NULL,
  pass VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  telefone INTEGER UNSIGNED NULL,
  nif INTEGER UNSIGNED ZEROFILL NULL,
  morada VARCHAR(45) NULL,
  codigoPostal VARCHAR(45) NULL,
  role ENUM ("F","C","A")NULL,
  localidade VARCHAR(45) NULL,
  PRIMARY KEY(id)
);



CREATE TABLE Empresa (
  idEmpresa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  designacaoSocial VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  telefone INT NULL,
  nif INTEGER UNSIGNED NULL,
  morada VARCHAR(45) NULL,
  codigoPostal VARCHAR(45) NULL,
  localidade VARCHAR(45) NULL,
  capitalSocial DECIMAL NULL,
  PRIMARY KEY(idEmpresa)
);



CREATE TABLE Produto (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Iva_id INTEGER UNSIGNED NOT NULL,
  referencia VARCHAR(45) NULL,
  descricao VARCHAR(45) NULL,
  preco INTEGER UNSIGNED NULL,
  stock INTEGER UNSIGNED NULL,
  PRIMARY KEY(id, Iva_id),
  INDEX Produto_FKIndex1(Iva_id),
  FOREIGN KEY(Iva_id)
    REFERENCES Iva(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);



CREATE TABLE Fatura (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Utilizador_id INTEGER UNSIGNED NOT NULL,
  dataFatura DATE NULL,
  valorTotal DECIMAL NULL,
  ivaTotal DECIMAL NULL,
  estado ENUM ("emitida","EmLancamento")NULL,
  PRIMARY KEY(id, Utilizador_id),
  INDEX Fatura_FKIndex1(Utilizador_id),
  INDEX Fatura_FKIndex2(Utilizador_id),
  FOREIGN KEY(Utilizador_id)
    REFERENCES Utilizador(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Utilizador_id)
    REFERENCES Utilizador(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE LinhaFatura (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Fatura_id INTEGER UNSIGNED NOT NULL,
  Produto_id INTEGER UNSIGNED NOT NULL,
  Produto_Iva_id INTEGER UNSIGNED NOT NULL,
  Fatura_Utilizador_id INTEGER UNSIGNED NOT NULL,
  quantidade INTEGER UNSIGNED NULL,
  valor INTEGER UNSIGNED NULL,
  PRIMARY KEY(id, Fatura_id, Produto_id, Produto_Iva_id, Fatura_Utilizador_id),
  INDEX LinhaFatura_FKIndex1(Fatura_id, Fatura_Utilizador_id),
  INDEX LinhaFatura_FKIndex2(Produto_id, Produto_Iva_id),
  FOREIGN KEY(Fatura_id, Fatura_Utilizador_id)
    REFERENCES Fatura(id, Utilizador_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Produto_id, Produto_Iva_id)
    REFERENCES Produto(id, Iva_id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


