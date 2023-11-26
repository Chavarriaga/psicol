-- --------------------------------------------------------
-- Host:                         C:\Users\elseb\OneDrive\PROGRAMACION\varios\Documentos\SQlite\db_psicol.db
-- Versión del servidor:         3.39.4
-- SO del servidor:              
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla db_psicol.Asignaturas
CREATE TABLE IF NOT EXISTS Asignaturas (
    IdAsignatura INTEGER PRIMARY KEY,
    Nombre TEXT NOT NULL,
    Descripcion TEXT,
    Creditos INTEGER,
    AreaConocimiento TEXT,
    ElectivaObligatoria TEXT CHECK(ElectivaObligatoria IN ('Electiva', 'Obligatoria'))
);

-- Volcando datos para la tabla db_psicol.Asignaturas: 0 rows
/*!40000 ALTER TABLE "Asignaturas" DISABLE KEYS */;
/*!40000 ALTER TABLE "Asignaturas" ENABLE KEYS */;

-- Volcando estructura para tabla db_psicol.Estudiantes
CREATE TABLE IF NOT EXISTS Estudiantes (
    Documento INTEGER PRIMARY KEY,
    Nombres TEXT NOT NULL,
    Telefono TEXT,
    Email TEXT,
    Direccion TEXT,
    Ciudad TEXT,
    Semestre INTEGER
);

-- Volcando datos para la tabla db_psicol.Estudiantes: 0 rows
/*!40000 ALTER TABLE "Estudiantes" DISABLE KEYS */;
/*!40000 ALTER TABLE "Estudiantes" ENABLE KEYS */;

-- Volcando estructura para tabla db_psicol.Profesores
CREATE TABLE IF NOT EXISTS Profesores (
    Documento INTEGER PRIMARY KEY,
    Nombres TEXT NOT NULL,
    Telefono TEXT,
    Email TEXT,
    Direccion TEXT,
    Ciudad TEXT
);

-- Volcando datos para la tabla db_psicol.Profesores: 0 rows
/*!40000 ALTER TABLE "Profesores" DISABLE KEYS */;
/*!40000 ALTER TABLE "Profesores" ENABLE KEYS */;

-- Volcando estructura para tabla db_psicol.ProfesorEstudianteAsignatura
CREATE TABLE IF NOT EXISTS ProfesorEstudianteAsignatura (
    IdRelacion INTEGER PRIMARY KEY,
    IdProfesor INTEGER,
    IdEstudiante INTEGER,
    IdAsignatura INTEGER,
    FOREIGN KEY (IdProfesor) REFERENCES Profesores(Documento),
    FOREIGN KEY (IdEstudiante) REFERENCES Estudiantes(Documento),
    FOREIGN KEY (IdAsignatura) REFERENCES Asignaturas(IdAsignatura),
    UNIQUE (IdEstudiante, IdAsignatura) -- Un estudiante no puede repetir la misma asignatura
);

-- Volcando datos para la tabla db_psicol.ProfesorEstudianteAsignatura: 0 rows
/*!40000 ALTER TABLE "ProfesorEstudianteAsignatura" DISABLE KEYS */;
/*!40000 ALTER TABLE "ProfesorEstudianteAsignatura" ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
