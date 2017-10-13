<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage2.master" CodeFile="AddExp.aspx.cs" Inherits="AddExp" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <br />
    <asp:Label ID="Label4" runat="server" Font-Bold="True" Font-Size="21px" 
        ForeColor="#0099FF" Text="Add Expense" Font-Underline="True"></asp:Label>
<table>

<tr>
<td>
    <br />
    <asp:Label ID="Label6" runat="server" Text="Transaction Id" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox3" runat="server" ReadOnly="True" BackColor="#333333" 
        ForeColor="White"></asp:TextBox>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label1" runat="server" Text="UID" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox1" runat="server" ReadOnly="True" BackColor="#333333" 
        ForeColor="White"></asp:TextBox>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label2" runat="server" Text="Amount" Font-Bold="True"></asp:Label>
    <br />
    <br />
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox2" Required="" runat="server"></asp:TextBox>
    <br />
    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
        ControlToValidate="TextBox2" ErrorMessage="Amount is not valid!!!" 
        ForeColor="Red" ValidationExpression="^[0-9]*$"></asp:RegularExpressionValidator>
    <br />
    <asp:Panel ID="Panel1" runat="server" Visible="false" ForeColor="Red" 
        Font-Names="Comic Sans MS">
    The amount exceeds the limit!!<br />
        Would u like to update the amount?&nbsp;&nbsp;<asp:Button ID="Button2" runat="server" 
            BorderColor="#0099CC" onclick="Button2_Click" Text="Yes" />
&nbsp;
        <asp:Button ID="Button3" runat="server" Text="No" BorderColor="#0066CC" 
            onclick="Button3_Click" />
    </asp:Panel>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label3" runat="server" Text="Source" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox4" Required="" runat="server"></asp:TextBox>
</td>
</tr>



<tr>
<td>
    &nbsp;</td>
<td>
    &nbsp;</td>
</tr>



<tr>
<td>
    <asp:Label ID="Label7" runat="server" Text="Date" Font-Bold="True"></asp:Label>
</td>
<td>
    <asp:TextBox ID="TextBox5" Required="" Type="Date" runat="server"></asp:TextBox>
</td>
</tr>



<tr><td colspan="2" align="center">
    <br />
    <asp:Button ID="Button1" runat="server" Text="Submit" onclick="Button1_Click" 
        Font-Bold="True" ForeColor="#0099CC" CssClass="intabular" Height="31px" 
        Width="79px" /></td></tr>
</table>
    <br />
</asp:Content>
