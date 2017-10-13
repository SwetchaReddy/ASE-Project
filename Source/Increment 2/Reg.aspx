<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master" CodeFile="Reg.aspx.cs" Inherits="Reg" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <center>
    <table  align="center" class="intabular">
<tr>
<td colspan="2" align="center">
<h2 style="color: #0033CC; text-decoration: underline;">Register</h2>
</td>
</tr>

<tr>
<td colspan="2" align="center">
All fields marked * are compulsary
</td>
</tr>

<tr>
<td >
First Name
</td>
<td >

    <asp:TextBox ID="txtfname" runat="server"></asp:TextBox>

    *<asp:RegularExpressionValidator ID="RegularExpressionValidator1" 
        runat="server" ControlToValidate="txtfname" 
        ErrorMessage="RegularExpressionValidator" 
        ValidationExpression="^[a-z A-Z]+$" ForeColor="Red">Enter 
    valid name</asp:RegularExpressionValidator>

</td>
</tr>

<!--<tr>
<td>
Middle Name
</td>
<td>

    <asp:TextBox ID="txtmname" runat="server"></asp:TextBox>

    *<asp:RegularExpressionValidator ID="RegularExpressionValidator2" 
        runat="server" ControlToValidate="txtmname" 
        ErrorMessage="RegularExpressionValidator" 
        ValidationExpression="^[a-zA-Z]+$" ForeColor="Red">Enter 
    valid name</asp:RegularExpressionValidator>

</td>
</tr>-->

<tr>
<td class="style2">
Last Name
</td>
<td class="style2">

    <asp:TextBox ID="txtlname" runat="server"></asp:TextBox>

    *<asp:RegularExpressionValidator ID="RegularExpressionValidator3" 
        runat="server" ControlToValidate="txtlname" 
        ErrorMessage="RegularExpressionValidator" 
        ValidationExpression="^[a-zA-Z]+$" ForeColor="Red">Enter 
    valid name</asp:RegularExpressionValidator>

</td>
</tr>

<tr>
<td>

    <asp:Label ID="Label2" runat="server" Text="Gender"></asp:Label>

</td>
<td>

    <asp:DropDownList ID="DropDownList1" runat="server">
        <asp:ListItem>Male</asp:ListItem>
        <asp:ListItem>Female</asp:ListItem>
    </asp:DropDownList>

</td>
</tr>

<tr>
<td>
Email
</td>
<td>

    <asp:TextBox ID="txtemail" runat="server"></asp:TextBox>

    *<asp:RegularExpressionValidator ID="RegularExpressionValidator4" 
        runat="server" ErrorMessage="RegularExpressionValidator" 
        ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" 
        ControlToValidate="txtemail" ForeColor="Red">Enter Valid Email</asp:RegularExpressionValidator>

</td>
</tr>

<tr>
<td>
Contact No
</td>
<td>

    <asp:TextBox ID="txtcontact" runat="server"></asp:TextBox>

    *<asp:RegularExpressionValidator ID="RegularExpressionValidator5" 
        runat="server" ErrorMessage="RegularExpressionValidator" 
        ValidationExpression="^[7-9][0-9]{9}$" ControlToValidate="txtcontact" 
        ForeColor="Red">Enter Valid Contact
    </asp:RegularExpressionValidator>

</td>
</tr>

<!--<tr>
<td class="style1">
City
</td>
<td class="style1">

    <asp:TextBox ID="txtcity" runat="server"></asp:TextBox>

</td>
</tr>-->

<!--<tr>
<td>
Address
</td>
<td>

    <asp:TextBox ID="txtaddress" runat="server" TextMode="MultiLine"></asp:TextBox>

</td>
</tr>


<tr>-->
<td>
    Username</td>
<td>

    <asp:TextBox ID="txtusername" runat="server"></asp:TextBox>

    *<!--<asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="Check" />-->
    <asp:Label ID="lblusername" runat="server" ForeColor="Red"></asp:Label>
    </td>
</tr>


<tr>
<td>
    Password</td>
<td>

    <asp:TextBox ID="txtpassword" runat="server" Enabled="True" 
        TextMode="Password"></asp:TextBox>

    *</td>
</tr>

<tr>
<td class="style1">
Uid
</td>
<td class="style1">

    <asp:TextBox ID="txtuid" runat="server" Enabled="False" ReadOnly="True"></asp:TextBox>

</td>
</tr>


<tr>
<td colspan="2">

   

    <asp:Label ID="Label1" runat="server" ForeColor="Red" 
        Text="Please enter all required fields" Visible="False"></asp:Label>

   

</td>
</tr>

<tr>
<td colspan="2" align="center">

    <asp:Button ID="Button1" runat="server" Text="Register" 
        onclick="Button1_Click" BorderColor="#0099FF" CssClass="intabular" 
        Height="36px" Width="107px" />

    <br />
    <br />

</td>
</tr>
</table>
</center>
</asp:Content>
