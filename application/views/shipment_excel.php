<?php echo '<?xml version="1.0"?>'; ?>
<?php echo '<?mso-application progid="Excel.Sheet"?>'; ?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>Parsel</Author>
  <LastAuthor>Parsel</LastAuthor>
  <Created><?php echo date('c'); ?></Created>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s63">
   <Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"
    ss:Bold="1"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="Shipment">
  <Table>
   <Column ss:AutoFitWidth="0" ss:Width="161.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="82.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="108.75"/>
   <Column ss:Index="5" ss:AutoFitWidth="0" ss:Width="82.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="161.25"/>
   <Column ss:AutoFitWidth="0" ss:Width="82.5"/>
   <Column ss:AutoFitWidth="0" ss:Width="56.25" ss:Span="1"/>
   <Row>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Customer</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Shipment</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Description</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Status</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Origin</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Now At</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Destination</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Collie</Data></Cell>
    <Cell ss:StyleID="s63"><Data ss:Type="String">Weight</Data></Cell>
   </Row>
<?php
	foreach($data as $row) {
?>
   <Row>
    <Cell><Data ss:Type="String"><?php echo $row['customer']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['shipment']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['description']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['status']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['origin']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['now_at']; ?></Data></Cell>
    <Cell><Data ss:Type="String"><?php echo $row['destination']; ?></Data></Cell>
    <Cell><Data ss:Type="Number"><?php echo $row['collie']; ?></Data></Cell>
    <Cell><Data ss:Type="Number"><?php echo $row['weight']; ?></Data></Cell>
   </Row>
<?php
	}
?>
  </Table>
 </Worksheet>
</Workbook>
