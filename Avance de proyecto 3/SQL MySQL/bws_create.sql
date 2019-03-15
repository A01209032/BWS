-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla departamento
--

CREATE TABLE departamento (
  IdDepartamento numeric(25) NOT NULL PRIMARY KEY,
  NombreDepartamento varchar(30) NOT NULL,
  contraseña numeric(25) NOT NULL,
  IdRol numeric(25) NOT NULL
)



-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla pacientes
--

CREATE TABLE pacientes (
  IdPaciente numeric(25) NOT NULL PRIMARY KEY,
  Nombre varchar(30) NOT NULL,
  FechadeNacimiento date NOT NULL,
  Sexo char(1) NOT NULL,
  Activo numeric(1) NOT NULL,
  Direccion varchar(50) NOT NULL,
  Telefono numeric(10) NOT NULL,
  Celular numeric(10) NOT NULL,
  Religion varchar(30) NOT NULL
)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla permisos
--

CREATE TABLE permisos (
  IdPermiso numeric(25) NOT NULL PRIMARY KEY,
  NombrePermiso varchar(30) NOT NULL
)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla rol
--

CREATE TABLE rol (
  IdRol numeric(25) NOT NULL PRIMARY KEY,
  NombreRol varchar(30) NOT NULL
)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tipodeservicio
--

CREATE TABLE tipodeservicio (
  IdServicio numeric(25) NOT NULL PRIMARY KEY,
  idDepartmaneto numeric(25) NOT NULL FOREIGN KEY REFERENCES departamento('IdDepartamento'),
  NombreServicio varchar(30) NOT NULL,
  Descripcion varchar(50) NOT NULL,
  Fecha date NOT NULL
)



--
-- Estructura de tabla para la tabla voluntarios
--

CREATE TABLE voluntarios (
  IdVoluntario numeric(25) NOT NULL PRIMARY KEY,
  Nombre varchar(30) NOT NULL,
  FechadeNacimiento date NOT NULL,
  Sexo char(1) NOT NULL,
  Cargo varchar(30) NOT NULL,
  Tipo varchar(30) NOT NULL
)
CREATE TABLE atienden (
  IdDepartamento numeric(25) NOT NULL FOREIGN KEY REFERENCES departamento('IdDepartamento'),
  IdPaciente numeric(25) NOT NULL FOREIGN KEY REFERENCES pacientes('IdPaciente'),
  IdVoluntario numeric(25) NOT NULL FOREIGN KEY REFERENCES voluntarios('IdVoluntario'),
  IdTipoServicio numeric(25) NOT NULL FOREIGN KEY REFERENCES tipodeservicio('IdServicio'),
  Fecha datetime NOT NULL,
  Observaciones varchar(140) NOT NULL,
  CuotaRecup numeric(20,10) NOT NULL
)

ALTER TABLE atienden add constraint 'atiendenfk' PRIMARY KEY (IdDepartamento, IdPaciente, IdVoluntario, IdTipoServicio)

/*
SET DATEFORMAT ymd -- especificar formato de la fecha

BULK INSERT eq08.eq08.[atienden]
  FROM 'e:\wwwroot\eq08\atienden.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )*/
