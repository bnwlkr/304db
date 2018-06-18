import requests
import json

r = requests.get("https://api.quadrigacx.com/v2/ticker?book=btc_cad")

json_data = json.loads(r.text)


