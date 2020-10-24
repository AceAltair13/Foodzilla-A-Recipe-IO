<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <body>
                <h1>Frequently Asked Questions</h1>
                <xsl:for-each select="faq/question">
                    <h3>
                        <xsl:value-of select="number"/>: 
                        <span>
                            <xsl:value-of select="query"/>
                        </span>
                    </h3>
                    <xsl:value-of select="answer"/>
                    <br/><br/>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>