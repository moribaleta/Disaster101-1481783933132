import json
import requests
#import cgi

#pos = cgi.FieldStorage()
#print pos

#url_req = request.get('http://api.openweathermap.org/data/2.5/weather?lat=14.575&lon=121.043&appid=f7d05e671dc29ce9227fdae70f7376b1')

f = open('manila.json', 'r')
json_string = f.read()
#w = r.json()
w = json.loads(json_string)
#print w['weather'][0]['main'] + ': ' +w['weather'][0]['description']
#print str(float(w['main']['temp']) - 273.15) + ' C'

#(long, lat)
def get_coord():
    lon = w['coord']['lon']
    lat = w['coord']['lat']
    return (lon, lat)

def get_clouds():
    return w['weather'][0]['main'] + ': ' +w['weather'][0]['description']

def get_temp_c():
    return (float(w['main']['temp']) - 273.15)

def get_name():
    return w['name']

#(speed in km per s, wind degress)
def get_wind():
    speed = float(w['wind']['speed']) * 1.60934
    deg = float(w['wind']['deg'])
    return (speed, deg)

def get_country():
    return w['sys']['country']

def get_rain():
    for s in w:
        if s == 'rain':
            return w['rain']
        else: return 'none'

def get_visibility():
    v = w['visibility']
    degree = ''#very low, low, med, high
    if v >= 100000:
        degree = 'High'
    elif v <= 100000 and v >= 50000:
        degree = 'Medium'
    elif v <= 50000 and v >= 10000:
        degree = 'Low'
    elif v <= 10000:
        degree = 'Very Low'
    return str(v) + ' meters, ' + degree

def main_test():
    print get_name() + ', ' + get_country()
    print get_temp_c()
    print get_clouds()
    print get_rain()
    wind = get_wind()
    print 'Wind speed: ' + str(wind[0]) + ' km, Wind direction: ' + str(wind[1]) + ' degrees'
    print get_visibility()

    return 'working'
main_test()
