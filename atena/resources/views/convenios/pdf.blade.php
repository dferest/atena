<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 30px 40px 30px 40px; }
    .logo-madrid { width: 100px; }
    .anexo { text-align: center; font-weight: bold; font-size: 16px; margin-bottom: 10px; }
    .cuadro { border: 1px solid #000; padding: 12px; margin-bottom: 18px; }
    .cuadro .label { width: 120px; display: inline-block; }
    .cuadro .input { border-bottom: 1px solid #000; display: inline-block; min-width: 120px; }
    .exp-acuerdan { margin-top: 20px; }
    .exp-acuerdan .titulo { font-weight: bold; text-align: center; margin-bottom: 8px; }
    .exp-acuerdan ul { margin: 0 0 0 20px; padding: 0; }
    .exp-acuerdan li { margin-bottom: 4px; }
    .firmas { margin-top: 40px; display: flex; justify-content: space-between; }
    .firma { width: 40%; text-align: center; }
    .firma .label { margin-top: 30px; }
    .firma .fdo { margin-top: 40px; }
    .center { text-align: center; }
    .mb-10 { margin-bottom: 10px; }
    .mb-20 { margin-bottom: 20px; }
    .checkbox { display: inline-block; width: 12px; height: 12px; border: 1px solid #000; margin-right: 4px; vertical-align: middle; }
    .cuadro-flex { display: flex; justify-content: space-between; }
    .cuadro-flex > div { width: 48%; }
    .firma-date { margin-top: 30px; }
    .firma-nombre { margin-top: 40px; }
    .firma-fdo { margin-top: 60px; }
    .firma-label { font-weight: bold; }
  </style>
</head>
<body>
  <table width="100%">
    <tr>
      <td>
        <img src="{{ public_path('img/cMadrid.png') }}" class="logo-madrid">
      </td>
      <td style="text-align:right; font-size:12px;">
        <strong>Anexo 1-b</strong>
      </td>
    </tr>
  </table>

  <div class="anexo">CONVENIO Nº: <span style="border-bottom:1px solid #000; min-width:60px; display:inline-block;">{{ $convenio->numero_convenio }}</span></div>

  <div class="cuadro">
    <div class="mb-10"><strong>De una parte:</strong></div>
    <div>
      D. <span class="input" style="min-width:200px;">{{ $centro['director'] ?? '_________________________' }}</span>
      como Titular del Centro Educativo
    </div>
    <div>
      con N.I.F. <span class="input" style="min-width:120px;">{{ $centro['nif_centro'] }}</span>
      &nbsp;&nbsp;&nbsp; Código del Centro <span class="input" style="min-width:80px;">{{ $centro['codigo'] ?? '_________' }}</span>
    </div>
    <div>
      domiciliado en <span class="input" style="min-width:180px;">{{ $centro['direccion'] }}</span>
      provincia de <span class="input" style="min-width:100px;">{{ $centro['provincia'] }}</span>
      calle <span class="input" style="min-width:120px;">{{ $centro['direccion'] }}</span>
    </div>
    <div>
      C.P. <span class="input" style="min-width:60px;">{{ $centro['cp'] }}</span>
      &nbsp;&nbsp; C.I.F. <span class="input" style="min-width:100px;">{{ $centro['nif_centro'] }}</span>
      &nbsp;&nbsp; Teléfono <span class="input" style="min-width:100px;">{{ $centro['telefono'] }}</span>
      &nbsp;&nbsp; Fax <span class="input" style="min-width:100px;">{{ $centro['fax'] }}</span>
    </div>
    <div class="mb-10 mt-10"><strong>y de otra:</strong></div>
    <div>
      D. <span class="input" style="min-width:200px;">{{ $convenio->empresa->ceo ?? '_________________________' }}</span>
      como representante legal de la Empresa/Entidad colaboradora
    </div>
    <div>
      con N.I.F. <span class="input" style="min-width:120px;">{{ $convenio->empresa->nif }}</span>
    </div>
    <div>
      domiciliada en <span class="input" style="min-width:180px;">{{ $convenio->empresa->direccion }}</span>
      provincia de <span class="input" style="min-width:100px;">{{ $convenio->empresa->provincia }}</span>
      país <span class="input" style="min-width:80px;">{{ $convenio->empresa->pais }}</span>
    </div>
    <div>
      calle <span class="input" style="min-width:120px;">{{ $convenio->empresa->direccion }}</span>
      C.P. <span class="input" style="min-width:60px;">{{ $convenio->empresa->codigo_postal }}</span>
    </div>
    <div>
      C.I.F. <span class="input" style="min-width:100px;">{{ $convenio->empresa->nif }}</span>
      &nbsp;&nbsp; Teléfono <span class="input" style="min-width:100px;">{{ $convenio->empresa->telefono }}</span>
      &nbsp;&nbsp; Fax <span class="input" style="min-width:100px;">__________________</span>
    </div>
  </div>

  <div class="exp-acuerdan">
    <div class="titulo">EXPONEN</div>
    <ul>
      <li><span class="checkbox" checked></span> Que ambas partes se reconocen recíprocamente capacidad y legitimidad para convenir.</li>
      <li><span class="checkbox"></span> Que el objeto del presente Convenio es establecer la colaboración entre las entidades a las que representan para el desarrollo de un <strong>Programa Formativo</strong> de Formación en Centros de Trabajo, dirigido a los alumnos que cursan Formación Profesional Reglada.</li>
      <li><span class="checkbox"></span> El módulo profesional de Formación en Centros de Trabajo está regulado por el artículo 25 del Real Decreto 1147/2011, de 29 de julio, por el que se establece la ordenación general de la formación profesional del sistema educativo.</li>
    </ul>
    <div class="titulo" style="margin-top:18px;">ACUERDAN</div>
    <ul>
      <li>Suscribir el presente Convenio de colaboración para el desarrollo del módulo profesional de Formación en Centros de Trabajo de los Ciclos Formativos y las Prácticas Formativas de otras enseñanzas, de acuerdo con las normas emitidas por la Consejería de Educación e Investigación de la Comunidad de Madrid, que ambas partes conocen y aceptan, y a lo dispuesto en las cláusulas que figuran al dorso de este documento.</li>
      <li>Incorporar durante el periodo de vigencia las relaciones nominales de alumnos acogidos al mismo (<strong>Relación de Alumnos</strong>), la programación de las actividades formativas a desarrollar por estos en las empresas (<strong>Programa Formativo</strong>), y los documentos que faciliten su seguimiento y evaluación.</li>
    </ul>
  </div>

  <div class="firmas">
    <div class="firma">
      <div>En ____________, a ____ de ____________ de 20__</div>
      <div class="firma-label">EL TITULAR DEL CENTRO</div>
      <div class="firma-fdo">Fdo.: ___________________________</div>
    </div>
    <div class="firma">
      <div>&nbsp;</div>
      <div class="firma-label">EL REPRESENTANTE DE LA EMPRESA</div>
      <div class="firma-fdo">Fdo.: ___________________________</div>
    </div>
  </div>

  <div style="text-align:center; font-size:10px; margin-top:30px;">
    <span>Página 1</span>
  </div>
<div style="page-break-before: always;"></div>

  <div style="margin-top: 30px;">
    <h3 style="text-align:center; font-weight:bold; margin-bottom: 20px;">Cláusulas del Convenio</h3>
    <p style="text-align:justify;">
      PRIMERA.- Los alumnos que figuran en la «Relación de Alumnos» del presente convenio desarrollarán las actividades formativas 
      programadas (Programa Formativo), en los locales del centro o centros de trabajo de la empresa firmante, o, en su caso, en 
      aquellos lugares en los que la empresa desarrolle su actividad productiva, sin que ello implique relación laboral alguna con ella.<br><br>
      SEGUNDA.- La empresa se compromete al cumplimiento de la programación de actividades formativas que previamente hayan sido 
      acordadas con el centro educativo, a realizar su seguimiento y la valoración del progreso de los alumnos y, junto con el tutor del 
      centro educativo, a la revisión de la programación, si una vez iniciado el período de prácticas, y a la vista de los resultados, fuese 
      necesario.<br><br>
      TERCERA.- La empresa nombrará un responsable para la coordinación de las actividades formativas a realizar en el centro de 
      trabajo, que garantizará la orientación y consulta del alumno, facilitará las relaciones con el profesor-tutor del centro educativo y 
      aportará los informes valorativos que contribuyen a la evaluación. A tal fin, facilitará al profesor-tutor del centro educativo el acceso a 
      la empresa y las actuaciones de valoración y supervisión del proceso.<br><br>
      CUARTA.- Cada alumno dispondrá de un documento de seguimiento y evaluación de las actividades realizadas, que será 
      supervisado por el responsable de la empresa en colaboración con el tutor del centro educativo. En dicho documento figurarán las 
      actividades formativas más significativas realizadas en la empresa, con registro de los resultados obtenidos, que cumplimentará el 
      responsable de la empresa.<br><br>
      QUINTA.- La empresa o entidad colaboradora no podrá cubrir, ni siquiera con carácter interino, ningún puesto de trabajo en plantilla 
      con el alumno que realice actividades formativas en ella, salvo que se establezca al efecto una relación laboral de contraprestación 
      económica por servicios contratados. En este caso, se considerará que el alumno abandona el programa formativo en el centro de 
      trabajo, debiéndose comunicar este hecho por la empresa o institución colaboradora al Director del Centro, quien lo pondrá en 
      conocimiento de la Dirección del Área Territorial correspondiente.<br><br>
      SEXTA.- Los alumnos no percibirán cantidad alguna por la realización de las actividades formativas en la empresa.<br><br>
      SÉPTIMA.- La duración de este convenio es de un año a partir de su firma, considerándose prorrogado automáticamente cuando 
      ninguna de las partes firmantes manifieste lo contrario. Podrá rescindirse por mutuo acuerdo entre el centro educativo y la institución 
      colaboradora, o por denuncia de una de las partes, que será comunicada a la otra con una antelación mínima de 15 días, cuando
      concurra alguna de las circunstancias siguientes: 
      <br>a) Cese de actividades del centro educativo o de la entidad colaboradora.
      <br>b) Imposibilidad de desarrollar adecuadamente las actividades programadas, por causas imprevistas.
      <br>c) Incumplimiento de las cláusulas establecidas en el convenio de colaboración en relación con las normas por las que se 
      rijan las actividades programadas.
      <br>
      Igualmente, podrá excluirse la participación en el convenio de uno o varios alumnos por decisión unilateral del centro educativo, de la 
      institución colaboradora, o conjunta de ambos, previa audiencia del interesado, en los siguientes casos:
      <br>a) Faltas repetidas de asistencia o puntualidad no justificadas.
      <br>b) Actitud incorrecta o falta de aprovechamiento.
      <br>c) Incumplimiento del programa formativo en el centro de trabajo.
      <br>
      En cualquier caso, el Centro Educativo deberá informar a la Dirección del Área Territorial de la extinción o rescisión del Convenio.
      Asimismo, los representantes de los trabajadores de los centros de trabajo serán informados del contenido específico del programa 
      formativo que desarrollarán los alumnos sujetos al convenio de colaboración, de su duración, del horario de las actividades, y la 
      localización del Centro o Centros de trabajo donde éstas se realizarán.<br><br>
      OCTAVA.- Cualquier eventualidad de accidente que pudiera producirse será contemplada a tenor del Seguro Escolar, de acuerdo 
      con la Reglamentación establecida por el Decreto 2078/71 de 13 de agosto (BOE del 13 de septiembre). Todo ello sin perjuicio de la 
      póliza que la Consejería de Educación pueda suscribir como seguro adicional para mejorar indemnizaciones, cubrir daños a terceros 
      o responsabilidad civil.<br><br>
      NOVENA.- En todo momento, el alumno irá provisto del D.N.I. o documento acreditativo de la identidad y tarjeta de identificación del 
      centro educativo.
    </p>
  </div>

  <div style="page-break-before: always;"></div>

  <table width="100%">
    <tr>
      <td>
        <img src="{{ public_path('img/cMadrid.png') }}" class="logo-madrid">
      </td>
      <td style="text-align:center; font-size:16px;">
        <strong>Anexo 2.1</strong><br>
        <span style="font-size:14px;">MÓDULO DE FORMACIÓN EN CENTROS DE TRABAJO</span>
      </td>
      <td style="text-align:right; font-size:12px;">
        <img src="{{ public_path('img/uEuropa.png') }}" style="width:80px;">
      </td>
    </tr>
  </table>

  <div style="font-weight:bold; margin-top:10px;">Relación de Alumnos <span style="font-weight:normal;">(1)</span></div>
  <div style="margin-bottom:8px;">Dirección del Área Territorial de MADRID: ____________________________________________</div>

  <table width="100%" style="margin-bottom:10px;">
    <tr>
      <td style="border:1px solid #000; text-align:center; font-size:12px; width:33%;">
        Nº del CONVENIO (2)<br>
        <span style="font-weight:bold;">{{ $convenio->numero_convenio }}</span>
      </td>
      <td style="width:2%;"></td>
      <td style="border:1px solid #000; text-align:center; font-size:12px; width:33%;">
        Nº del Anexo 2.1 (3)<br>
        <span style="font-weight:bold;">______</span>
      </td>
    </tr>
  </table>

  <div style="border:1px solid #000; padding:8px; margin-bottom:10px;">
    Relación de alumnos acogidos al CONVENIO Nº <strong>{{ $convenio->numero_convenio }}</strong> suscrito con fecha ____ de ____________ de 20__ <br>
    entre el Centro Educativo <strong>{{ $centro['nombre'] ?? '_________________' }}</strong>
    y la Empresa <strong>{{ $convenio->empresa->nombre }}</strong>
    que realizarán el módulo de Formación en Centros de Trabajo (FCT) o Prácticas Formativas en el periodo abajo indicado.
  </div>

  <div>
    <span style="display:inline-block; width:120px;">CURSO ACADÉMICO:</span> _______________________
    <span style="display:inline-block; width:80px; margin-left:30px;">CLAVE:</span> _______________________
    <span style="display:inline-block; width:120px; margin-left:30px;">CICLO FORMATIVO:</span> _______________________
  </div>
  <div style="margin-top:5px;">
    OTRAS ENSEÑANZAS: _______________________________________________________________________________________
  </div>
  <div style="margin-top:5px;">
    Fecha de inicio: ____________ &nbsp;&nbsp; Fecha de terminación: ____________ &nbsp;&nbsp; Días de la semana: _______________________
  </div>
  <div style="margin-top:5px;">
    Horario de mañana &nbsp;&nbsp; Horario de tarde &nbsp;&nbsp; Horas día: (4) _______ Total Horas: _______
  </div>
  <div style="margin-top:5px;">
    Hora inicio: _______ Hora terminación: _______ &nbsp;&nbsp; Hora de inicio: _______ Hora de terminación: _______
  </div>
  <div style="margin-top:5px;">
    LOCALIDAD DEL CENTRO DE TRABAJO: <span style="border-bottom:1px solid #000; min-width:120px; display:inline-block;">{{ $convenio->empresa->ciudad }}</span>
    &nbsp;&nbsp; DIRECCIÓN: <span style="border-bottom:1px solid #000; min-width:200px; display:inline-block;">{{ $convenio->empresa->direccion }}</span>
  </div>

  <table width="100%" style="margin-top:10px; border-collapse:collapse;">
    <tr>
      <th style="border:1px solid #000; text-align:center; width:60%;">APELLIDOS y Nombre</th>
      <th style="border:1px solid #000; text-align:center; width:40%;">D.N.I.</th>
    </tr>
    @foreach($convenio->alumnos as $alumno)
    <tr>
      <td style="border:1px solid #000; padding:4px;">{{ $alumno->ape1 }} {{ $alumno->ape2 }}, {{ $alumno->nombre }}</td>
      <td style="border:1px solid #000; padding:4px;">{{ $alumno->dni }}</td>
    </tr>
    @endforeach
    @for($i = $convenio->alumnos->count(); $i < 6; $i++)
    <tr>
      <td style="border:1px solid #000; padding:12px;">&nbsp;</td>
      <td style="border:1px solid #000; padding:12px;">&nbsp;</td>
    </tr>
    @endfor
  </table>

  <div style="margin-top:10px;">
    En cumplimiento de la cláusula tercera del CONVENIO, se procede a designar Profesor-Tutor del Centro Educativo a D.
    <span style="border-bottom:1px solid #000; min-width:180px; display:inline-block;">{{ $convenio->profesor->nombre ?? '' }} {{ $convenio->profesor->ape1 ?? '' }} {{ $convenio->profesor->ape2 ?? '' }}</span>
    con NIF <span style="border-bottom:1px solid #000; min-width:100px; display:inline-block;">{{ $convenio->profesor->dni ?? '' }}</span>
    y Tutor del centro de trabajo a D. <span style="border-bottom:1px solid #000; min-width:180px; display:inline-block;">{{ $convenio->empresa->ceo ?? '' }}</span>
  </div>

  <div style="margin-top:10px;">
    En ________________________, a ____ de ____________________ de 20__
  </div>

  <table width="100%" style="margin-top:20px;">
    <tr>
      <td style="text-align:center;">
        EL DIRECTOR DEL CENTRO EDUCATIVO<br><br>
        Fdo.: ___________________________
      </td>
      <td style="text-align:center;">
        EL REPRESENTANTE DE LA EMPRESA<br><br>
        Fdo.: ___________________________
      </td>
    </tr>
  </table>

  <div style="font-size:9px; margin-top:10px;">
    (1) Se cumplimentará un Anexo 2.1 por cada grupo de alumnos del mismo Ciclo Formativo y modalidad de enseñanza, que realice el módulo de FCT en la misma Institución.<br>
    (2) Especificar el nº del CONVENIO, suscrito con anterioridad a la realización de las prácticas.<br>
    (3) Cada grupo de alumnos tendrá su nº de Anexo 2.1 en orden de registro, vinculado al mismo Convenio.<br>
    (4) Señalar las horas totales de realización de la actividad, excluidos, en su caso, el descanso para la comida.<br>
  </div>
</body>
</html>
