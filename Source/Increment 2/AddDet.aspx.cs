using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class AddDet_ : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=F:\Daily Expense Tracker (hemakshi naik)\Daily Expense Tracker (hemakshi naik)\Project\App_Data\Database.mdf;Integrated Security=True;User Instance=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        TextBox1.Text = Session["uid"].ToString();
        if (Session["Add"] == "Data")
        {
            String alertmsg = "Income details added";
            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);
            Session["Add"] = "";
        }
        try
        {  
            int s = 0;
            SqlDataAdapter da = new SqlDataAdapter("Select max(tid) from inc", con);
            DataSet ds = new DataSet();
            da.Fill(ds);
            s = Convert.ToInt32(ds.Tables[0].Rows[0][0]);
            s++;
            TextBox3.Text = Convert.ToString(s);
           
        }
        catch (Exception ex)
        {
            TextBox3.Text = "101";
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (TextBox2.Text != "0")
        {
            con.Open();
            string[] date = TextBox5.Text.Split('-');
            string year = date[0].ToString();
            string month = date[1].ToString();
            string day = date[2].ToString();
            string ins1 = "insert into inc values('" + TextBox3.Text + "','" + TextBox1.Text + "','" + TextBox2.Text + "','" + TextBox4.Text + "','" + day + "','" + month + "','" + year + "')";
            SqlCommand cmd = new SqlCommand(ins1, con);
            cmd.ExecuteNonQuery();
            con.Close();
            Session["Add"] = "Data";
            Response.Redirect("AddDet.aspx");
           
        }
        else
        {
            String alertmsg = "0 value not accepted !";
            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);
        }
    }
    protected void TextBox4_TextChanged(object sender, EventArgs e)
    {

    }
}