<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage2.master" CodeFile="ViewExp.aspx.cs" Inherits="ViewExp" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <br />
    <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Size="21px" 
        ForeColor="#0099FF" Text="View Expense" Font-Underline="True"></asp:Label>
    <br />
        <asp:Label ID="LabelUid" runat="server" Visible="False"></asp:Label>
    <br />
    Search By<br />
    Month&nbsp;
    <asp:DropDownList ID="DropDownList1" runat="server">
     <asp:ListItem>--Select--</asp:ListItem>
            <asp:ListItem Value="01">01</asp:ListItem>
            <asp:ListItem Value="02">02</asp:ListItem>
            <asp:ListItem Value="03">03</asp:ListItem>
            <asp:ListItem Value="04">04</asp:ListItem>
            <asp:ListItem Value="05">05</asp:ListItem>
            <asp:ListItem Value="06">06</asp:ListItem>
            <asp:ListItem Value="07">07</asp:ListItem>
            <asp:ListItem Value="08">08</asp:ListItem>
            <asp:ListItem Value="09">09</asp:ListItem>
            <asp:ListItem Value="10">10</asp:ListItem>
            <asp:ListItem Value="11">11</asp:ListItem>
            <asp:ListItem Value="12">12</asp:ListItem>
    </asp:DropDownList>
    <br />
    <br />
    Year&nbsp;&nbsp; 
    <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" CssClass="intabular" 
        onclick="Button1_Click" Text="Search" />
    <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" BackColor="White" AutoGenerateColumns="False"
        BorderColor="#336666" BorderStyle="Double" BorderWidth="3px" 
    CellPadding="4" Width="740px" 
       >
        <FooterStyle BackColor="White" ForeColor="#333333" />
        <HeaderStyle BackColor="#336666" Font-Bold="True" ForeColor="White" />
        <PagerStyle BackColor="#336666" ForeColor="White" HorizontalAlign="Center" />
        <RowStyle BackColor="White" ForeColor="#333333" />
        <SelectedRowStyle BackColor="#339966" Font-Bold="True" ForeColor="White" />
        <SortedAscendingCellStyle BackColor="#F7F7F7" />
        <SortedAscendingHeaderStyle BackColor="#487575" />
        <SortedDescendingCellStyle BackColor="#E5E5E5" />
        <SortedDescendingHeaderStyle BackColor="#275353" />
        <Columns>
        <asp:BoundField HeaderText="TID" DataField="tid" />
        <asp:BoundField HeaderText="User Id" DataField="uid" />
        <asp:BoundField HeaderText="Amount" DataField="amt" />
        <asp:BoundField HeaderText="Source" DataField="src" />
         <asp:TemplateField HeaderText="Date">
<ItemTemplate>
    <asp:Label ID="Label1" runat="server" Text='<%#Eval("date")+ "/ " + Eval("mon")+"/"+ Eval("yr")%>'></asp:Label>
</ItemTemplate>
</asp:TemplateField>
        </Columns>
    </asp:GridView>
    <br />
    <br />
</asp:Content>
