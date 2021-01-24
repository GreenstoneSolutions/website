# How to install SSL certificates

- Create bundle file from Comodo SSL
<code>
sudo cat greenstone_digital.crt AddTrustExternalCARoot.crt USERTrustRSAAddTrustCA.crt SectigoRSADomainValidationSecureServerCA.crt > ssl-bundle.crt

</code>


- Copy files
<code>
sudo cp ssl-bundle.crt /opt/bitnami/apache2/conf/

sudo cp greenstone_digital.crt /opt/bitnami/apache2/conf/
</code>

- Restart the server
<code>
sudo /opt/bitnami/ctlscript.sh restart apache

</code>
