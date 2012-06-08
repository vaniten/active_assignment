util.toJSONString=function (obj) {
    var jsonData='';
    if (typeof obj === "string")
        jsonData = obj;
    else {
        var objProps=[];
        for (var key in obj) {
            objProps.push(key);
        }
        objProps=objProps.sort();
        var key;
        for (var i=0;i<objProps.length;i++){
            key=objProps[i];
            if (jsonData == '')
                jsonData = '{"' + key + '":';
            else
                jsonData += ',"' + key + '":';
                
            if (typeof obj[key]=='object' && (Object.prototype.toString.call(obj[key]) === '[object Date]')){
                obj[key]=(obj[key]).toISOString();
            }
            
            jsonData += JSON.stringifyWcf(obj[key]);
            
        }
        if (jsonData != '')
            jsonData += '}';
    }
    return jsonData;
}

JSON.stringifyWcf = function (json) {
	/// <summary>
	/// Wcf specific stringify that encodes dates in the
	/// a WCF compatible format ("/Date(9991231231)/")
	/// Note: this format works ONLY with WCF.
	///       ASMX can use ISO dates as of .NET 3.5 SP1
	/// </summary>
	/// <param name="key" type="var">property name</param>
	/// <param name="value" type="var">value of the property</param>
	return JSON.stringify(json, function (key, value) {
		if (json && json.hasOwnProperty(key) && typeof json[key]=='object'){
			if (Object.prototype.toString.call(json[key]) === '[object Date]'){
				value =(json[key]).toISOString();
			}
		}
		
		if (typeof value == "string") {
			var a = reISO.exec(value);
			if (a) {
				var val = '/Date(' +
						  new Date(Date.UTC(+a[1], +a[2] - 1,
								   +a[3], +a[4],
								   +a[5], +a[6])).getTime() + ')/';
				this[key] = val;
				return val;
			}
		}
		return value;
	})
};
