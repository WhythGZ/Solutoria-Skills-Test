import requests
import mysql.connector
from os.path import join, dirname
import os
from dotenv import load_dotenv

#cargando el .env
dotenv_path = join(dirname(__file__), '.env')
load_dotenv(dotenv_path)

#obtencion de token
username = input('Ingrese su username de acceso: ')
url = 'https://postulaciones.solutoria.cl/api/acceso'
json = {
  "userName": username,
  "flagJson": True
}

response = requests.post(url=url, json=json) 
auth_token = response.json()['token']

#obtencion de indicadores
print('Obteniendo indicadores...')
header = {'Authorization': 'Bearer ' + auth_token}
url = 'https://postulaciones.solutoria.cl/api/indicadores'
response = requests.get(url=url, headers=header)
data = response.json()

#obteniendo los valores de la db desde el .env
db_host = os.environ.get("DB_HOST")
db_user = os.environ.get("DB_USERNAME")
db_password = os.environ.get("DB_PASSWORD")
db_database = os.environ.get("DB_DATABASE")

#conectandose a la db
conexion = mysql.connector.connect(
    host=db_host,
    user=db_user,
    password=db_password,
    database=db_database
)
cursor = conexion.cursor()

#rellenando la tabla indicadores
print('Importando indicadores a la base de datos (esto podria tardar varios minutos)...')
for indicador in data:
    nombreIndicador = indicador['nombreIndicador']
    codigoIndicador = indicador['codigoIndicador']
    unidadMedidaIndicador = indicador['unidadMedidaIndicador']
    valorIndicador = indicador['valorIndicador']
    fechaIndicador = indicador['fechaIndicador']
    tiempoIndicador = indicador['tiempoIndicador']
    origenIndicador = indicador['origenIndicador']
    consulta = "INSERT INTO indicadores (nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador) VALUES (%s, %s, %s, %s, %s, %s, %s)"
    valores = (nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador)
    cursor.execute(consulta, valores)
    conexion.commit()
    
print('Indicadores importados correctamente...')
cursor.close()
conexion.close()