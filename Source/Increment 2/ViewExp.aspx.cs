using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class ViewExp : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=F:\Daily Expense Tracker (hemakshi naik)\Daily Expense Tracker (hemakshi naik)\Project\App_Data\Database.mdf;Integrated Security=True;User Instance=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        LabelUid.Text = Session["uid"].ToString();
        SqlDataAdapter da = new SqlDataAdapter("Select * from exp where uid='" + LabelUid.Text + "'", con);
        DataSet ds = new DataSet();
        da.Fill(ds);

        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataAdapter da = new SqlDataAdapter("Select * from exp where uid='" + LabelUid.Text + "' and mon='" + DropDownList1.Text + "' and yr='" + TextBox2.Text + "'", con);
        DataSet ds = new DataSet();
        da.Fill(ds);

        GridView1.DataSource = ds;
            GridView1.DataBind();
        
    }
}