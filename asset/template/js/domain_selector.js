var Domain_Selector={
	getCookie: function(cname)
	{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) 
		  {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		  }
		return "";
	},
    get_subdomains_by_cat: function (select){
		var ln = Domain_Selector.getCookie('lang');
        var dtid = $(select).val();
		if(dtid!==''){
			var url = "/npfadmin/domains/getdomains?ln="+ln+"&dtid="+dtid;
			Domain_Selector.get_subdomains(select,url);
		}else{
			Domain_Selector.removeNextToAll(select);
		}		
    },
    removeNextToAll: function (select){
		$(select).parent().nextAll('div.div-subdomain').remove();
    },
    get_subdomains_by_dn: function (select){
		var ln = Domain_Selector.getCookie('lang');
        var dn = $(select).val();
        var url = "/npfadmin/domains/getdomains?ln="+ln+"&dn="+dn;
        Domain_Selector.get_subdomains(select,url);
    },
    build_subdomains_list: function(select, data){
        var name = $(select).attr('name') + "_";
        var $div = $("<div>").attr('class','div-subdomain');
        var $a = $("<a>").html('go').attr('href','#').attr('class','button_go')
            .click(function(){
                var v = $(this).prev().val();
                window.location = "http://"+v;
            });
		
        var $select = $("<select>").attr('name',name)
            .change(function() {
                Domain_Selector.get_subdomains_by_dn(this);
            }).mouseup(function(e){
				e.preventDefault();
			}).focus(function() {
				setTimeout(function() {$select.select();}, 0);
			});
		var count_option=0;
        $.each(data, function() {		
			if(count_option<1)
			{
				var o1 = $("<option>").html("বাছাই করুন").attr('value', "");
				o1.appendTo($select);
				var o = $("<option>").html(this.name).attr('value', this.domainname);
				o.appendTo($select);
			}
			else
			{
				var o = $("<option>").html(this.name).attr('value', this.domainname);
				o.appendTo($select);
			}            
			count_option++;
        });

        Domain_Selector.removeNextToAll(select);

        $select.appendTo($div);
        $a.appendTo($div);
        $(select).parent().after($div);
    },
    get_subdomains: function (select,url)
    {
        $.post(url, function(data) {
        })
            .success(function(data) {
                if(data.length>0)
                {
                    Domain_Selector.build_subdomains_list(select, data);
                }
				
				else
				{
					//alert("i am here...");
					var ii = $(select).parent().next('.div-subdomain').size();					
					if(ii > 0)
					{
						$(select).parent().next().remove();
					}
				}
				
            })
            .error(function() {
            })
            .complete(function() {
            });
    }
};
