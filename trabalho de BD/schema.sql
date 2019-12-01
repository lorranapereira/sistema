CREATE TABLE "Curso" (
"id" serial,
"nome" varchar(100) NOT NULL,
"area" varchar(100) NOT NULL,
"cargaHoraria" int NOT NULL,
"dataFundacao" date NOT NULL,
CONSTRAINT "CursoPK" PRIMARY KEY ("id"));

CREATE TABLE "Aluno"
(
  "id" serial,
 "nome" varchar(100) NOT NULL,
  "dtnascimento" date,
  "matricula" varchar(8) NOT NULL unique,
  "fk_curso" integer NOT NULL,
  "fk_turma" integer not null,
  CONSTRAINT alunopk PRIMARY KEY ("id"),
  CONSTRAINT "alunoFKcurso" FOREIGN KEY ("fk_curso")
      REFERENCES "Curso" ("id")
      ON UPDATE CASCADE ON DELETE SET NULL,
  CONSTRAINT "alunoFKturma" FOREIGN KEY ("fk_turma")
      REFERENCES "Turma" ("id")
      ON UPDATE CASCADE ON DELETE SET NULL
)

CREATE TABLE "Turma" (
"id" serial,
"nome" varchar(10) NOT NULL,
CONSTRAINT "turmaPK" PRIMARY KEY ("id")
);

CREATE TABLE "Professor" (
"id" serial,
"nome" varchar(10) NOT NULL,
CONSTRAINT "professorPK" PRIMARY KEY ("id")
);

CREATE TABLE "TurmaProfessor" (
"fk_professor" integer NOT NULL,
"fk_turma" integer not null,
 CONSTRAINT "professorfk" FOREIGN KEY ("fk_professor")
      REFERENCES "Professor" ("id")
      ON UPDATE CASCADE ON DELETE SET NULL,
  CONSTRAINT "turmafk" FOREIGN KEY ("fk_turma")
      REFERENCES "Turma" ("id")
      ON UPDATE CASCADE ON DELETE SET NULL
);

