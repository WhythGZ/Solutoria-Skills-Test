import requests
import mysql.connector

auth_token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJQb3N0dWxhY2lvbmVzSldUU2VydmljZUFjY2Vzc1Rva2VuIiwianRpIjoiNzgyYmQ4NzYtZDQxZi00ODAwLTg0NGItMTljMzk3ODY1NWJjIiwiaWF0IjoiNC84LzIwMjMgNTo1NjowOCBQTSIsIlVzZXJJZCI6IklkIiwiRGlzcGxheU5hbWUiOiJQb3N0dWxhbnRlIDIwMjMwNCIsIlVzZXJOYW1lIjoiYWxpZ29uemFsZXpxcnV0eHRfamFjQGluZGVlZGVtYWlsLmNvbSIsIkVtYWlsIjoiYWxpZ29uemFsZXpxcnV0eHRfamFjQGluZGVlZGVtYWlsLmNvbSIsImV4cCI6MTY4MDk5MTI2OCwiaXNzIjoiaHR0cHM6Ly9zb2x1dG9yaWEuY2wvIiwiYXVkIjoiSldUU2VydmljZVBvc3R1bGFudGUifQ.qToZVg5tOmR3a2rxGjoHaRwjAOtmeXt1KBOzMno3hdo'

header = {'Authorization': 'Bearer ' + auth_token}
url = 'https://postulaciones.solutoria.cl/api/indicadores'
response = requests.get(url=url, headers=header)
print(response)

data = response.json()

conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="solutoriaskillstest"
)

cursor = conexion.cursor()

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

cursor.close()
conexion.close()