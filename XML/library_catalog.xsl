<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <body>
        <h2>Library Catalog</h2>
        <table border="1">
          <tr bgcolor="#9acd32">
            <th>Book Name</th>
            <th>Author</th>
            <th>Year of Publication</th>
            <th>Subject Area</th>
            <th>Price (Rs)</th>
          </tr>
          <xsl:for-each select="catalog/book">
            <tr>
              <td>
                <xsl:value-of select="name"/>
              </td>
              <td>
                <xsl:value-of select="author"/>
              </td>
              <td>
                <xsl:value-of select="year"/>
              </td>
              <td>
                <xsl:value-of select="subject"/>
              </td>
              <td>
                <xsl:value-of select="price"/>
              </td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>