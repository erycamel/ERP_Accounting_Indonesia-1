<style>
#ticker {
	height: 240px;
	overflow: hidden;

}
#ticker li {
	height: 40px;
}
</style>

<ul id="ticker">
	<li>
	<h4>Photo Gallery</h4>
	<p>
	Photo Gallery for show Photo. <a href="http://www.yiiframework.com/extension/xflexslider" target="_blank">XFlexSlider</a>
	</p>
	</li>
	
	<li>
	<h4>Company News </h4>
	<p>
	Company News. Blog Style. <a href="http://www.yiiframework.com/doc/api/1.1/CActiveDataProvider"target="_blank">CActiveDataProvider</a>
	</p>
	</li>

	<li>
	<h4>MailBox</h4>
	<p>
	Internal Mail Message between User. <a href="http://www.yiiframework.com/extension/mailbox" target="_blank">Mail Box</a>
	</p>
	</li>
	
	<li>
	<h4>Personal Folder</h4>
	<p>
	Personal storage Folder. Put our files into server. <a href="http://www.yiiframework.com/extension/elfinder" target="_blank">Personal Files</a>
	</p>
	</li>
	
	<li>
	<h4>Public Folder</h4>
	<p>
	Public storage Folder. Collaborate files between user. Read and Write style. <a href="http://www.yiiframework.com/extension/elfinder" target="_blank">Public Files</a>
	</p>
	</li>

	<li>
	<h4>System Folder</h4>
	<p>
	Administrator storage Folder. Read only mode folder style. <a href="http://www.yiiframework.com/extension/elfinder" target="_blank">System Files</a>
	</p>
	</li>
	
	<li>
	<h4>RBAC</h4>
	<p>
	User security level system. a dynamic and powerfull security approach. <a href="http://www.yiiframework.com/extension/rights" target="_blank">Security System</a>
	</p>
	</li>
	
	<li>
	<h4>Backup</h4>
	<p>
	Manual Backup Execution. <a href="http://www.yiiframework.com/extension/database-dumper" target="_blank">Database Dumper</a>
	</p>
	</li>
	
	<li>
	<h4>Web Services</h4>
	<p>
	Web Service integration. <a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.webservice" target="_blank">SOAP Server</a>
	</p>
	</li>
	
	<li>
	<h4>Bootstrap Twitter CSS Layout</h4>
	<p>
	Yii Integration with one of the Best CSS Framework. <a href="http://www.yiiframework.com/extension/bootstrap" target="_blank">Bootstrap Twitter</a>
	</p>
	</li>
	
	<li>
	<h4>Internationalization. Indonesian Format</h4>
	<p>
	Yii with Indonesian format number and language. <a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.i18n" target="_blank">Bahasa Indonesia</a>
	</p>
	</li>
	
	<li>
	<h4>Calendar</h4>
	<p>
	Create and View Schedule, Calendar, and Company Event. <a href="http://www.yiiframework.com/extension/cal" target="_blank">Company Calendar</a>
	</p>
	</li>
	
	<li>
	<h4>Twitter Info</h4>
	<p>
	Yii integration with third party features. <a href="http://www.yiiframework.com/extension/yrsstwitter" target="_blank">Twitter News Stream</a>
	</p>
	</li>
	
	<li>
	<h4>Flick Photo</h4>
	<p>
	Combine Yii with external Class. <a href="http://phpflickr.com/" target="_blank">PHP Flickr</a>
	</p>
	</li>
	

	<li>
	<h4>Asset Management</h4>
	<p>
	Powerful Yii Features. Nested Module <a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module" target="_blank">Module</a>
	</p>
	</li>
	
	<li>
	<h4>Person Module</h4>
	<p>
	Person Module. HR Application
	</p>
	</li>
	
	<li>
	<h4>Leave</h4>
	<p>
	Leave Module. HR Application
	</p>
	</li>
	
	<li>
	<h4>Recruitment</h4>
	<p>
	Recruitment Module. HR Application
	</p>
	</li>
	
	<li>
	<h4>Accounting</h4>
	<p>
	Accounting Module. Accounting and Finance Application
	</p>
	</li>
	
	<li>
	<h4>Purchasing Order</h4>
	<p>
	Purchasing Order. Accounting and Finance Application. (available soon)
	</p>
	</li>
	
	<li>
	<h4>Account Payable</h4>
	<p>
	Account Payable. Accounting and Finance Application. (available soon)
	</p>
	</li>
	
	<li>
	<h4>Inventory</h4>
	<p>
	inventory. Accounting and Finance Application. (available soon)
	</p>
	</li>
	
	<li>
	<h4>Sales Order</h4>
	<p>
	Sales Order. Accounting and Finance Application. (available soon)
	</p>
	</li>
	
	<li>
	<h4>Account Receivable</h4>
	<p>
	Account Receivable. Accounting and Finance Application. (available soon)
	</p>
	</li>
	
	<li>
	<h4>Profit/Lost</h4>
	<p>
	Account Payable. Accounting and Finance Application.
	</p>
	</li>
	
	<li>
	<h4>Balance Sheet</h4>
	<p>
	Balance Sheet. Accounting and Finance Application.
	</p>
	</li>
	
	
</ul>

<script>

	function tick(){
		$('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
	}
	setInterval(function(){ tick () }, 1500);


</script>
