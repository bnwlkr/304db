import requests
import json

r = requests.get("https://api.quadrigacx.com/v2/ticker?book=btc_cad")

json_data = json.loads(r.text)

request_string = "http://btfd.group/commodities/update/?" + "commodity_name=btc&exchange_name=QuadrigaCX&bid=" + str(json_data['bid']) + "&ask=" + str(json_data['ask']) + "&volume=" + str(json_data['volume'])

r = requests.get(request_string)

print r.content

